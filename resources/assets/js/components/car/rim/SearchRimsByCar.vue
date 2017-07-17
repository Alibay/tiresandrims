<template>
    <div>
        <select-modification
                :brands="brands"
                :initModels="initModels"
                :initGenerations="initGenerations"
                :initModifications="initModifications"
                :initSelectedBrand="initSelectedBrand"
                :initSelectedModel="initSelectedModel"
                :initSelectedGeneration="initSelectedGeneration"
                :initSelectedModification="initSelectedModification"
                :on-modification-change="onModificationChange"
        />
        <div v-if="equipments.length > 0">
            <div class="row">
                <div class="col-md-12" v-if="factoryEquipments.length > 0">
                    <h3>Заводская комплектация:</h3>
                    <div>
                        <div v-for="equipment in factoryEquipments">
                            <a v-bind:href="tireUrl(equipment.tire)">
                                <b><tire-label :data="equipment.tire" /></b>
                            </a>
                            <b>диск</b>: <rim-label :data="equipment.rim" />
                            <input type="checkbox" :value="equipment.id" v-model="chosenEquipments">
                            <bolt-label />
                        </div>
                    </div>
                </div>
                <div class="col-md-12" v-if="nonFactoryEquipments.length > 0">
                    <h3>Варианты замены:</h3>
                    <div>
                        <div v-for="equipment in nonFactoryEquipments">
                            <a v-bind:href="tireUrl(equipment.tire)">
                                <b><tire-label :data="equipment.tire" /></b>
                            </a>
                            <b>диск</b>: <rim-label :data="equipment.rim" />
                            <input type="checkbox" :value="equipment.id" v-model="chosenEquipments">
                            <bolt-label />
                        </div>
                    </div>
                </div>
            </div>
            <select-detail-model
                    :disabled="chosenEquipments.length == 0"
                    type="RIM"
                    :ids="chosenRims()"
            />
            <div class="row">
                <div class="col-md-12">
                    <label for="byParams">Подбор: строго по параметрам</label>
                    <input type="checkbox" id="byParams"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="withoutWidth">без учета ширины</label>
                    <input type="checkbox" id="withoutWidth"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="withoutET">без учета вылета</label>
                    <input type="checkbox" id="withoutET"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="withoutDIA">без учета цент. отверстия</label>
                    <input type="checkbox" id="withoutDIA"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Ширина диска:</label>
                    <vue-slider
                        :min="rim.initialMinWidth"
                        :max="rim.initialMaxWidth"
                        v-model="rim.value"
                        :interval="rim.step">
                    </vue-slider>
                </div>
                <div class="col-md-3">
                    <label>Диапазон с</label>
                    <input type="text" class="form-control" v-model="rim.value[0]" />
                </div>
                <div class="col-md-3">
                    <label>по</label>
                    <input type="text" class="form-control" v-model="rim.value[1]" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Вылет:</label>
                    <vue-slider
                            :min="et.initialMin"
                            :max="et.initialMax"
                            v-model="et.value"
                            :interval="et.step">
                    </vue-slider>
                </div>
                <div class="col-md-3">
                    <label>Диапазон с</label>
                    <input type="text" class="form-control" v-model="et.value[0]" />
                </div>
                <div class="col-md-3">
                    <label>по</label>
                    <input type="text" class="form-control" v-model="et.value[1]" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Вылет:</label>
                    <vue-slider
                            :min="dia.initialMin"
                            :max="dia.initialMax"
                            v-model="dia.value"
                            :interval="dia.step">
                    </vue-slider>
                </div>
                <div class="col-md-3">
                    <label>Диапазон с</label>
                    <input type="text" class="form-control" v-model="dia.value[0]" />
                </div>
                <div class="col-md-3">
                    <label>по</label>
                    <input type="text" class="form-control" v-model="dia.value[1]" />
                </div>
            </div>
            <button type="submit" class="btn btn-default btn-lg" :disabled="chosenEquipments.length == 0">Искать</button>
        </div>
    </div>
</template>

<script>
    import Select2 from './../../common/Select2.vue';
    import SelectDetailModel from './../detail-model/SelectDetailModel.vue';
    import SelectModification from './../modification/SelectModification.vue';
    import RimLabel from './../rim/RimLabel.vue';
    import TireLabel from './../tire/TireLabel.vue';
    import BoltLabel from './../bolt/BoltLabel.vue';

    import VueSliderComponent from 'vue-slider-component';
    import 'vue-range-slider/dist/vue-range-slider.css';

    export default {
        props: [
            'brands',
            'initSelectedBrand',
            'initModels',
            'initSelectedModel',
            'initGenerations',
            'initEquipments',
            'initModifications',
            'initSelectedGeneration',
            'initSelectedModification',
        ],

        created: function () {
            this.equipments = this.initEquipments;
            this.separateEquipments(this.equipments);
        },

        data () {
            return {
                rim: {
                    value: [4.5, 10],
                    initialMinWidth: 4.5,
                    initialMaxWidth: 10,
                    step: 0.5,
                },
                et: {
                    value: [-20, 55],
                    initialMin: -20,
                    initialMax: 55,
                    step: 1,
                },
                dia: {
                    value: [54.1, 76.0],
                    initialMin: 54.1,
                    initialMax: 76.0,
                    step: 0.1,
                },
                selectedModification: 0,
                equipmentsCache: {},
                modifications: [],
                factoryEquipments: [],
                nonFactoryEquipments: [],
                equipments: [],
                chosenEquipments: [],

                chosenRims: function () {
                    return this.equipments
                            .filter(equipment => this.chosenEquipments.indexOf(equipment.rim.id) != -1)
                            .map(equipment => equipment.rim.id);
                },

                tireUrl: function ( tire ) {
                    return laroute.route('tire-search-by-car');
                },
            }
        },

        methods: {

            onRimWidthChanged: function() {
                [this.rim.minWidth, this.rim.maxWidth] = this.$refs.rimWidthSlider.getValue();;
            },

            onModificationChange: function ( modification ) {
                this.selectedModification = modification;

                if (this.selectedModification == 0) {
                    this.equipments = [];
                    this.factoryEquipments = [];
                    this.nonFactoryEquipments = [];
                    return;
                }

                if (!(this.selectedModification in this.equipmentsCache)) {
                    this.$http.get(laroute.route('api-modification-equipments', { modificationId: this.selectedModification }))
                        .then(data => {
                            this.equipmentsCache[this.selectedModification] = this.equipments = data.body;
                            this.separateEquipments(this.equipmentsCache[this.selectedModification]);
                        });
                } else {
                    this.equipments = this.equipmentsCache[this.selectedModification];
                    this.separateEquipments(this.equipmentsCache[this.selectedModification]);
                }
            },

            separateEquipments: function ( equipments ) {
                let factoryEquipments = [];
                let nonFactoryEquipments = [];

                _.forEach(equipments, eq => {
                    if (eq.from_factory) {
                        factoryEquipments.push(eq);
                    } else {
                        nonFactoryEquipments.push(eq);
                    }
                });

                this.factoryEquipments = factoryEquipments;
                this.nonFactoryEquipments = nonFactoryEquipments;
            },
        },

        components: {
            'select2': Select2,
            'select-detail-model': SelectDetailModel,
            'select-modification': SelectModification,
            'rim-label': RimLabel,
            'tire-label': TireLabel,
            'bolt-label': BoltLabel,
            'vue-slider': VueSliderComponent,
        }
    }
</script>
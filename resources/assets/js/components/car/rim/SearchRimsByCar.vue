<template>
    <div>
        <select-modification :brands="brands" :on-modification-change="onModificationChange" />
        <div v-if="selectedModification > 0">
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
            <select-wheel-model :disabled="chosenEquipments.length == 0"/>
            <button type="submit" class="btn btn-default btn-lg" :disabled="chosenEquipments.length == 0">Искать</button>
        </div>
    </div>
</template>

<script>
    import Select2 from './../../common/Select2.vue';
    import SelectWheelModel from './../wheel-model/SelectWheelModel.vue';
    import SelectModification from './../modification/SelectModification.vue';
    import RimLabel from './../rim/RimLabel.vue';
    import TireLabel from './../tire/TireLabel.vue';
    import BoltLabel from './../bolt/BoltLabel.vue';

    export default {
        props: ['brands'],

        data () {
            return {
                selectedModification: 0,
                equipmentsCache: {},
                modifications: [],
                factoryEquipments: [],
                nonFactoryEquipments: [],
                equipments: [],
                chosenEquipments: [],

                tireUrl: function ( tire ) {
                    return laroute.route('tire-search-by-car');
                },
            }
        },

        methods: {

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
                            this.equipmentsCache[this.selectedModification] = data.body;
                            this.separateEquipments(this.equipmentsCache[this.selectedModification]);
                        });
                } else {
                    this.separateEquipments(this.equipmentsCache[this.selectedModification]);
                }
            },

            separateEquipments: function ( equipments ) {
                _.forEach(equipments, eq => {
                    if (eq.from_factory) {
                        this.factoryEquipments.push(eq);
                    } else {
                        this.nonFactoryEquipments.push(eq);
                    }
                });
            },

            /*changeEquipment: function ( equipment ) {
                if (equipment.id in this.chosenEquipments) {
                    delete this.chosenEquipments[equipment.id];
                } else {
                    this.chosenEquipments[equipment.id] = 0;
                }

                this.selectedAnyEquipments =_.isEmpty(this.chosenEquipment);
                console.log(this.selectedAnyEquipments);
            }*/
        },

        components: {
            'select2': Select2,
            'select-wheel-model': SelectWheelModel,
            'select-modification': SelectModification,
            'rim-label': RimLabel,
            'tire-label': TireLabel,
            'bolt-label': BoltLabel,
        }
    }
</script>
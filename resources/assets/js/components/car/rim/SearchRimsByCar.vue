<template>
    <div>
        <select-modification :brands="brands" :on-modification-change="onModificationChange" />
        <div v-if="selectedModification > 0">
            <div class="row">
                <div class="col-md-12" v-if="factoryEquipments.length > 0">
                    <h3>Заводская комплектация:</h3>
                    <equipment-list-item v-for="equipment in factoryEquipments" v-bind:data="equipment"/>
                </div>
                <div class="col-md-12" v-if="nonFactoryEquipments.length > 0">
                    <h3>Варианты замены:</h3>
                    <equipment-list-item v-for="equipment in nonFactoryEquipments" v-bind:data="equipment"/>
                </div>
            </div>
            <select-wheel-model />
            <button type="submit" class="btn btn-default btn-lg" :disabled="selectedModification == 0">Искать</button>
        </div>
    </div>
</template>

<script>
    import Select2 from './../../common/Select2.vue';
    import EquipmentListItem from './../equipment/EquipmentListItem.vue';
    import SelectWheelModel from './../wheel-model/SelectWheelModel.vue';
    import SelectModification from './../modification/SelectModification.vue';

    export default {
        props: ['brands'],

        created: function () {
            console.log(this.brands);
        },

        data () {
            return {
                selectedModification: 0,

                equipmentsCache: {},
                modifications: [],

                factoryEquipments: [],
                nonFactoryEquipments: [],

                equipments: [],


                selectedAnyEquipments: false
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
            }
        },

        components: {
            'select2': Select2,
            'equipment-list-item': EquipmentListItem,
            'select-wheel-model': SelectWheelModel,
            'select-modification': SelectModification,
        }
    }
</script>
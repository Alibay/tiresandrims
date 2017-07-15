<template>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Марка</label>
                <select2
                        :options="transformedBrands"
                        :change="onBrandChange"
                        :minimumResultsForSearch="5"
                        defaultText="Выберите марку"
                        v-model="selectedBrand">
                </select2>
            </div>
            <div class="form-group">
                <label>Поколение</label>
                <select2
                        :options="generations"
                        :change="onGenerationChange"
                        :minimumResultsForSearch="5"
                        v-model="selectedGeneration"
                        defaultText="Выберите поколение"
                        :disabled="selectedModel == 0">
                </select2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Модель</label>
                <select2
                        :options="models"
                        :change="onModelChange"
                        :minimumResultsForSearch="5"
                        v-model="selectedModel"
                        defaultText="Выберите марку"
                        :disabled="selectedBrand == 0">
                </select2>
            </div>
            <div class="form-group">
                <label>Модификация</label>
                <select2
                        :options="modifications"
                        :change="onModificationChange"
                        :minimumResultsForSearch="5"
                        v-model="selectedModification"
                        defaultText="Выберите модификацию"
                        :disabled="selectedGeneration == 0">
                </select2>
            </div>
        </div>
    </div>
</template>

<script>
    import Select2 from './../../common/Select2.vue';

    export default {
        props: ['data'],

        data () {
            return {
                selectedBrand: 0,
                selectedModel: 0,
                selectedGeneration: 0,
                selectedModification: 0,

                modelsCache: {},
                modificationsCache: {},
                generationsCache: {},
                equipmentsCache: {},

                models: [],
                generations: [],
                modifications: [],
            }
        },

        methods: {
            onBrandChange: function () {
                this.selectedModel = 0;
                this.selectedGeneration = 0;
                this.selectedModification = 0;

                if (this.selectedBrand == 0) {
                    this.models = [];
                    return;
                }

                if (!(this.selectedBrand in this.modelsCache)) {
                    this.$http.get(laroute.route('api-brand-models', { brandId: this.selectedBrand }))
                            .then(data => {
                        this.modelsCache[this.selectedBrand] = this.models = _.map(data.body, model => {
                                return {
                                    id: model.id,
                                    text: model.name
                                };
                });
                })
                } else {
                    this.models = this.modelsCache[this.selectedBrand];
                }
            },

            onModelChange: function () {
                this.selectedGeneration = 0;
                this.selectedModification = 0;

                if (this.selectedModel == 0) {
                    this.generations = [];
                    return;
                }

                if (!(this.selectedModel in this.generationsCache)) {
                    this.$http.get(laroute.route('api-model-generations', { modelId: this.selectedModel }))
                            .then(data => {
                                this.generationsCache[this.selectedModel] = this.generations = _.map(data.body, g => {
                                    let yearTo = g.year_to > 0 ? g.year_to : 'present';
                                    return {
                                        id: g.id,
                                        text: `${g.year_from} - ${yearTo}`
                                    };
                                });
                            });
                } else {
                    this.generations = this.generationsCache[this.selectedModel];
                }
            },

            onGenerationChange: function () {
                this.selectedModification = 0;

                if (this.selectedGeneration == 0) {
                    this.modifications = [];
                    return;
                }

                if (!(this.selectedGeneration in this.modificationsCache)) {
                    this.$http.get(laroute.route('api-generation-modifications', { generationId: this.selectedGeneration }))
                            .then(data => {
                        this.modificationsCache[this.selectedGeneration] = this.modifications = _.map(data.body, m => {
                                return {
                                    id: m.id,
                                    text: m.name
                                };
                });

                    console.log(this.modifications);
                });
                } else {
                    this.modifications = this.modificationsCache[this.selectedGeneration];
                }
            },

            onModificationChange: function () {
                if (this.selectedModification == 0) {
                    this.equipments = [];
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
            }
        },

        components: {
            'select2': Select2,
        }
    }
</script>
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
                        :change="onLocalModificationChange"
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
        props: [
            'brands',
            'initSelectedBrand',
            'initModels',
            'initSelectedModel',
            'initSelectedModel',
            'initSelectedModel',
            'initGenerations',
            'initModifications',
            'initSelectedGeneration',
            'initSelectedModification',
            'onModificationChange',
        ],

        created: function () {
            this.selectedBrand = this.initSelectedBrand;
            this.selectedModel = this.initSelectedModel;
            this.selectedGeneration = this.initSelectedGeneration;
            this.selectedModification = this.initSelectedModification;

            this.modelsCache[this.selectedBrand] = this.transformModels(this.initModels);
            this.models = this.modelsCache[this.selectedBrand];

            this.generationsCache[this.selectedModel] = this.transformGenerations(this.initGenerations);
            this.generations = this.generationsCache[this.selectedModel];

            this.modificationsCache[this.selectedGeneration] = this.transformModifications(this.initModifications);
            this.modifications = this.modificationsCache[this.selectedGeneration];
        },

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

                transformedBrands: _.map(this.brands, brand => {
                    return {
                        id: brand.id,
                        text: brand.name
                    }
                }),
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
                        this.modelsCache[this.selectedBrand] = this.models = this.transformModels(data.body);
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
                                this.generationsCache[this.selectedModel] = this.generations = this.transformGenerations(data.body);
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
                        this.modificationsCache[this.selectedGeneration] = this.modifications = this.transformModifications(data.body);
                    });
                } else {
                    this.modifications = this.modificationsCache[this.selectedGeneration];
                }
            },

            onLocalModificationChange: function () {
                this.onModificationChange(this.selectedModification);
            },

            transformModels: function (models) {
                return _.map(models, model => {
                    return {
                        id: model.id,
                        text: model.name
                    };
                });
            },

            transformGenerations: function (generations) {
                return _.map(generations, g => {
                    let yearTo = g.year_to > 0 ? g.year_to : 'present';
                    return {
                        id: g.id,
                        text: `${g.year_from} - ${yearTo}`
                    };
                });
            },

            transformModifications: function (modifications) {
                return _.map(modifications, modification => {
                    return {
                        id: modification.id,
                        text: modification.name
                    };
                });
            },
        },

        components: {
            'select2': Select2,
        }
    }
</script>
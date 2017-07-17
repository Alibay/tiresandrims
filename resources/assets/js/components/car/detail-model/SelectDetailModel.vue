<template>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Производитель</label>
                <select2
                        :options="brands"
                        :change="onManufacturerChange"
                        :minimumResultsForSearch="5"
                        ref="brandEl"
                        v-model="selectedBrand"

                        defaultText="Выберите производителя"
                        :disabled="disabled">
                </select2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Модель</label>
                <select2
                        :options="models"
                        :change="onManufacturerModelChange"
                        :minimumResultsForSearch="5"
                        v-model="selectedModel"
                        :value="selectedModel"
                        defaultText="Выберите модель"
                        :disabled="disabled">
                </select2>
            </div>
        </div>
    </div>
</template>

<script>
    import Select2 from './../../common/Select2.vue';

    export default {
        props: ['data', 'disabled', 'iniSelectedBrand'],

        data: function () {
            return {
                selectedBrand: 0,
                selectedModel: 0,
                brands: [],
                models: [],

               /* brands: function () {
                    return this.data.map(item => {
                        return {
                            id: item.id,
                            text: item.name,
                        };
                    });
                },

                models: function () {
                    for (var i in this.data) {
                        if (this.data[i].id == this.selectedBrand) {

                            return this.data[i].models.map(model => {
                                return {
                                    id: model.id,
                                    text: model.name,
                                };
                            });
                        }
                    }

                    return [];
                }*/
            };
        },

        watch: {
//            iniSelectedBrand: function (value, oldValue) {
//                this.selectedBrand = value;
//            }

            data: function (data) {
                this.brands = data.map(item => {
                            return {
                                id: item.id,
                                text: item.name,
                            };
                });

                this.models = [];
                for (var i in data) {
                    if (data[i].id == this.selectedBrand) {

                        this.models = data[i].models.map(model => {
                                    return {
                                        id: model.id,
                                        text: model.name,
                                    };
                    });
                        break;
                    }
                }
            }
        },

        methods: {
            onManufacturerChange: function () {

            },

            onManufacturerModelChange: function () {

            },

            /*transformData: function () {
                this.brands = this.data.map(item => {
                            return {
                                id: item.id,
                                text: item.name,
                            };
                    });

                this.models = [];
                for (var i in this.data) {
                    if (this.data[i].id == this.selectedBrand) {

                        this.models = this.data[i].models.map(model => {
                                    return {
                                        id: model.id,
                                        text: model.name,
                                    };
                        });
                        break;
                    }
                }
            },*/
        },

        components: {
            'select2': Select2,
        }
    }
</script>
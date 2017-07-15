<template>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Производитель</label>
                <select2
                        :options="[]"
                        :change="onManufacturerChange"
                        :minimumResultsForSearch="5"
                        v-model="selectedManufacturer"
                        defaultText="Выберите производитель"
                        :disabled="selectedBrand == 0">
                </select2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Модель</label>
                <select2
                        :options="[]"
                        :change="onManufacturerModelChange"
                        :minimumResultsForSearch="5"
                        v-model="selectedManufacturerModel"
                        defaultText="Выберите модель"
                        :disabled="selectedBrand == 0">
                </select2>
            </div>
        </div>
    </div>
</template>

<script>
    import Select2 from './../../common/Select2.vue';

    export default {
        props: ['data'],

        methods: {
            onManufacturerChange: function () {

            },

            onManufacturerModelChange: function () {

            },
        },

        components: {
            'select2': Select2,
        }
    }
</script>
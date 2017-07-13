<template>
    <select class="form-control" :name="name">
        <slot></slot>
    </select>
</template>

<style src="select2/dist/css/select2.min.css" ></style>
<style src="select2-bootstrap-theme/dist/select2-bootstrap.min.css" ></style>

<script>
    import 'select2/dist/js/select2.full.min';

    export default {
        props: ['options', 'value', 'name', 'minimumResultsForSearch', 'change', 'defaultText'],

        data () {
            return {
                msg: 'Hello Vue!'
            }
        },

        mounted () {
            var vm = this;

            let options = [{ id:0, text: this.defaultText }].concat(this.options);

            $(this.$el)
                .select2({ theme: 'bootstrap', data: options, minimumResultsForSearch: this.minimumResultsForSearch })
                .val(this.value)
                .trigger('change')
                .on('change', function () {
                    vm.$emit('input', this.value);
                });
        },

        watch: {
            value: function (value) {
                $(this.$el).val(value).trigger('change')
                this.change.call();
            },

            options: function (options) {
                $(this.$el).select2().empty();
                options = [{ id:0, text: this.defaultText }].concat(options);
                $(this.$el).select2({ theme: 'bootstrap', data: options, minimumResultsForSearch: this.minimumResultsForSearch });
            }
        },

        destroyed: function () {
            $(this.$el).off().select2('destroy');
        }
    }
</script>
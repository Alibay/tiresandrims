<template>
    <div>
        <a v-bind:href="url(2)">
            <b><tire-label :data="data.tire" /></b>
        </a>
        <b>диск</b>: <rim-label :data="data.rim" />
        <input type="checkbox">
        <bolt-label />
    </div>
</template>

<script>
    import RimLabel from './../rim/RimLabel.vue';
    import TireLabel from './../tire/TireLabel.vue';
    import BoltLabel from './../bolt/BoltLabel.vue';

    export default {
        props: ['data'],

        data () {
            return {
                url: function (brandId) {
                    return laroute.route('api-brand-models', {brandId: brandId});
                }
            }
        },

        components: {
            'rim-label': RimLabel,
            'tire-label': TireLabel,
            'bolt-label': BoltLabel
        }
    }
</script>
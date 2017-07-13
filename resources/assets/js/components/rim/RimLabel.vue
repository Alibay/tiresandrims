<template>
    <span>
        {{ data.width }}{{ data.flange }}x{{ data.diameter }}-ET{{ data.et }}-{{ data.mounting_hole }}x{{ data.pcd }}-d{{ data.hub_diameter }}
    </span>
</template>

<script>
    export default {
        props: ['data']
    }
</script>
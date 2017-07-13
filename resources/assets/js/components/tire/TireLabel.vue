<template>
    <span>
        {{ data.width }}/{{ data.height }}R{{ data.radius }}
    </span>
</template>

<script>
    export default {
        props: ['data']
    }
</script>
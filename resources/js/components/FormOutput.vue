<!-- Output Component
    Receives parsed string for display
-->

<template>
    <article class="inner-wrapper">
        <h2>View the Results</h2>
        <div id="output-container">
            <span v-html="parsedString"></span>
        </div>
    </article>
</template>

<script>
    export default {
        name    : 'form-output',
        data    : function() {
            return {}
        },
        props   : {
            parsedString: String
        },
        methods : {
        }
    }
</script>
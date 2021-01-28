<!-- Form Component
    Passes string to be parsed to FormController
    Fetches result
    Passes result to Output
-->

<template>
    <article class="flex-container">
        <article class="inner-wrapper">
            <form id="word-wrap-form">
                <h2>Enter Your Content Here</h2>
                <fieldset>
                    <label for="string">Enter some text</label>
                    <input type="text" name="string" required="true" v-model="string">
                </fieldset>
                <fieldset>
                    <label for="number">Enter a number at which position to wrap that text</label>
                    <input type="number" name="number" required="true" v-model="number">
                </fieldset>
                <button id="submit" v-on:click="submitForm">Create wrapped text</button>
            </form>
        </article>

        <form-output-component :parsed-string='parsedString'></form-output-component>
    </article>
</template>

<script>
    export default {
        name    : 'word-wrap-form',
        props   : {},
        methods : {
            submitForm: function(event) {
                var component = this;

                // Don't submit the form
                event.preventDefault();

                // Get the response
                $.ajax({
                    url: '/submit-form',
                    data: {
                        'string': this.string,
                        'number': this.number
                    },
                    type: "GET",
                    success: function(response) {
                        component.parsedString = response['response'];
                    },
                    error: function(jqxhr, textStatus, errorThrown){

                    }
                });
            }
        },
        data() {
            return {
                string : '',
                number : 0,
                parsedString : ''
            }
        }
    }
</script>
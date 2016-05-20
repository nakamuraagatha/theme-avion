<template>

    <div class="uk-form-horizontal">

        <template v-if="node.type === 'page'">
            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Title' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <label><input type="checkbox" v-model="node.theme.title_hide"> {{ 'Hide Title' | trans }}</label>
                </div>
            </div>

            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Title Size' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <label><input type="checkbox" v-model="node.theme.title_large"> {{ 'Extra large title.' | trans }}</label>
                </div>
            </div>

            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Alignment' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <label><input type="checkbox" v-model="node.theme.alignment"> {{ 'Center the title and content.' | trans }}</label>
                </div>
            </div>
            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Padding' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <label><input type="checkbox" v-model="node.theme.padding"> {{ 'Remove the article padding.' | trans }}</label>
                </div>
            </div>
        </template>

        <div class="uk-form-row">
            <label for="form-class" class="uk-form-label">{{ 'HTML Class' | trans }}</label>
            <div class="uk-form-controls">
                <input id="form-class" class="uk-form-width-large" type="text" v-model="node.theme.html_class">
            </div>
        </div>

        <div class="uk-form-row">
            <span class="uk-form-label">{{ 'Sidebar' | trans }}</span>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.sidebar_first"> {{ 'Show the sidebar before the content.' | trans }}</label>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-navbar-layout" class="uk-form-label">{{ 'Navbar' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-navbar-layout" class="uk-form-width-large" v-model="node.theme.header_layout">
                    <option value="default">{{ 'Default' | trans }}</option>
                    <option value="alt">{{ 'Alternative' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-position-gutter" class="uk-form-label">{{ 'Remove the grid gutter' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.top_gutter"> {{ 'Top A' | trans }}</label>
            </div>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.top_b_gutter"> {{ 'Top B' | trans }}</label>
            </div>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.top_c_gutter"> {{ 'Top C' | trans }}</label>
            </div>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.top_d_gutter"> {{ 'Top D' | trans }}</label>
            </div>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.bottom_gutter"> {{ 'Bottom A' | trans }}</label>
            </div>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.bottom_b_gutter"> {{ 'Bottom B' | trans }}</label>
            </div>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.bottom_c_gutter"> {{ 'Bottom C' | trans }}</label>
            </div>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.bottom_d_gutter"> {{ 'Bottom D' | trans }}</label>
            </div>
        </div>

        <div class="uk-form-row">
            <span class="uk-form-label">{{ 'Footer' | trans }}</span>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="node.theme.footer_margin"> {{ 'Add top margin to the footer.' | trans }}</label>
            </div>
        </div>

    </div>

</template>

<script>

    module.exports = {

        section: {
            label: 'Theme',
            priority: 90
        },

        props: ['node']

    };

    window.Site.components['node-theme'] = module.exports;

</script>

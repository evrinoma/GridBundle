<template>
    <div>
        <button @click="getSelectedRows()">Get Selected Rows</button>
        <ag-grid-vue style="width: 700px; height: 500px;"
                     class="ag-theme-balham"
                     :columnDefs="columnDefs"
                     :rowData="rowData"
                     rowSelection="multiple"
                     @grid-ready="onGridReady"
        >
        </ag-grid-vue>
    </div>
</template>

<script>
    import {AgGridVue} from "ag-grid-vue";
    import {fetch} from 'whatwg-fetch';

    export default {
        name: 'agSimpleVue',
        data() {
            return {
                columnDefs: null,
                rowData: null
            }
        },
        components: {
            AgGridVue
        },
        methods: {
            loadRowData() {
                fetch(location.protocol + '//' + location.hostname + '/evrinoma/api/grid/ag_data_simple')
                    .then(result => result.json())
                    .then(rowData => this.rowData = rowData);
            },
            onGridReady(params) {
                this.gridApi = params.api;
                this.columnApi = params.columnApi;
            },
            getSelectedRows() {
                const selectedNodes = this.gridApi.getSelectedNodes();
                const selectedData = selectedNodes.map(node => node.data);
                const selectedDataStringPresentation = selectedData.map(node => node.make + ' ' + node.model).join(', ');
                alert(`Selected nodes: ${selectedDataStringPresentation}`);
            }
        },
        beforeMount() {
            this.columnDefs = [
                {headerName: 'Make', field: 'make', checkboxSelection: true},
                {headerName: 'Model', field: 'model'},
                {headerName: 'Price', field: 'price'}
            ];
        },
        created() {
            this.loadRowData();
        }
    }
</script>

<style lang="scss">
    @import "~ag-grid-community/dist/styles/ag-grid.css";
    @import "~ag-grid-community/dist/styles/ag-theme-balham.css";
</style>

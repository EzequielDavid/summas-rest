<template>
    <div class="card">
        <div class="card-header bg-dark text-white" style="font-size: 1.4em">
            {{company.name}}
            <button v-if="edit" v-on:click.prevent="editCompany" class="btn btn-success ml-3">Edit Company</button>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="form-control-label">Company Name:</label>
                <input v-if="edit" class="form-control" readonly v-model="company.name">
                <input v-else class="form-control"  v-model="company.name">
            </div>
            <div class="form-group">
                <label class="form-control-label">Email:</label>
                <input v-if="edit" class="form-control" readonly v-model="company.email">
                <input v-else class="form-control"  v-model="company.email">
            </div>
            <div class="form-group">
                <label class="form-control-label">Telephone:</label>
                <input v-if="edit" class="form-control" readonly v-model="company.telephone">
                <input v-else class="form-control" v-model="company.telephone">
            </div>
            <div class="card-footer">
                <div class="text-primary text-xl-center quantityText">Quantity Of Employees: {{company.quantity_of_employees}}</div>

                <div class="text-primary text-xl-center quantityText">Quantity Of Employees Developers: {{company.developers}}</div>

                <div class="text-primary text-xl-center quantityText">Quantity Of Employees Designers: {{company.designers}}</div>
            </div>
            <div v-show="edit===false" class="mt-4">
                <button v-on:click="updateCompany" class="btn btn-primary">Update</button>
                <button v-on:click="cancelEdit" class="btn btn-danger ml-3">Cancel</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "CompanyComponent",
    data(){
        return{
            company:'',
            edit:true
        }
    },
    mounted() {
        this.getCompany();
    },
    methods:{
        getCompany:function (){
            axios.get('api/company').then(response=>{
                this.company= response.data.data
            })
        },
        updateCompany:function (){
            axios.put('api/company/'+this.company.id,{
                name:this.company.name,
                email:this.company.email,
                telephone:this.company.telephone,
            }).then(response=>{
               this.edit=true
            })
        },
        editCompany:function(){
            this.edit = false
        },
        cancelEdit:function(){
            this.edit = true
        }

        }
}
</script>

<style scoped>
.quantityText{
    font-size: 1.1em;
}
</style>

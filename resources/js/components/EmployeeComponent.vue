<template>
    <div>
        <form-component v-on:enterNew="getEmployees">

        </form-component>

        <div class="card">
                <div class="card-header bg-dark text-white" style="font-size: 1.3em">
                    Employees
                    <p class="text-success" v-text="'Average Age'+' '+ averageAge"></p>
                </div>
                <div class="card-body m-auto">
                    <div class="col-md-12">
                        <table class="table table-hover table-striped table-responsive">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Age</th>
                                <th scope="col">Position</th>
                                <th scope="col">Position Time</th>
                                <th scope="col">View Detail&nbsp;</th>
                                <th scope="col">Delete&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="employee in employees">
                                <td class="font-weight-bold" v-text="employee.id"></td>
                                <td v-text="employee.name"></td>
                                <td v-text="employee.surname"></td>
                                <td v-text="employee.age"></td>
                                <td v-if="employee.position.type" v-text="designer"></td>
                                <td v-else v-text="developer"></td>
                                <td v-text="employee.created"></td>
                                <td><a href="#" class="btn btn-primary btn-block" type="submit" v-on:click.prevent="getEmployee(employee)">View Detail</a></td>
                                <td><a href="#" class="btn btn-danger btn-block" type="submit" v-on:click.prevent="deleteEmployee(employee)">Delete</a></td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <paginate-component :meta="meta" v-on:pagination="getEmployees"></paginate-component>
                            </tfoot>
                        </table>
                    </div>
                </div>
            <div>
                <employee-detail-component v-on:update="getEmployees" :employee="employee" :close="close">

                </employee-detail-component>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
    export default {
        data(){
            return{
                employees:[],
                employee:'',
                averageAge:'',
                close:'',
                designer:'Designer',
                developer:'Developer',
                meta:{},
                }
        },
        mounted() {
            this.getEmployees();
        },
        methods:
            {
                getEmployees: function(page)
                {
                    axios.get('api/employees',{
                        params:{
                            page
                        }
                    }).then(response=>{
                        this.employees = response.data.data
                        this.meta = response.data.meta
                        this.averageAge = response.data.meta.average_age
                    });
                },
                getEmployee: function(employee)
                {
                    axios.get('api/employees/'+employee.id).then(response=>{
                       this.employee = response.data
                        this.close=true
                    });
                },
                deleteEmployee: function(employee)
                {
                    axios.delete('api/employees/'+employee.id).then(response=>{
                        this.getEmployees();
                        alertify.alert('Delete Success')
                    });
                },
            }
    }
</script>

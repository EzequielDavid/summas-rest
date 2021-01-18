<template>
    <div>
        <form-component v-on:enterNew="getEmployees">

        </form-component>

        <div class="card">
                <div class="card-header bg-dark text-white" style="font-size: 1.4em">
                    Employees
                    <p class="text-success" v-text="'Average Age'+' '+ averageAge"></p>
                    <button v-on:click.prevent="getEmployees" class="btn btn-secondary float-right">OrderBy</button>
                    <select  v-model="orderParam" class="float-right mr-3 form-control-sm">
                        <option value="id">Id</option>
                        <option value="name">Name</option>
                        <option value="surname">surname</option>
                    </select>
                    <input type="search" v-model="filterParam" placeholder="Search" class="form-control-sm">
                    <button class="btn btn-secondary" v-on:click.prevent="filterSearch"><i class="fas fa-search"></i></button>
                </div>
                <div class="card-body m-auto">
                    <div class="col-md-12">
                        <table class="table table-hover table-striped table-responsive">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="">Id</th>
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
                                <td>
                                    <a data-toggle="modal" data-target="#detail-modal" class="btn btn-primary btn-block" type="submit" v-on:click.prevent="getEmployee(employee)">
                                        View Detail
                                    <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-block" type="submit" v-on:click.prevent="deleteEmployee(employee)">Delete
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <paginate-component :meta="meta" v-on:pagination="getEmployees"></paginate-component>
                            </tfoot>
                        </table>
                    </div>
                </div>
        </div>
        <div class="modal fade" id="detail-modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Update Employee</h2>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <employee-detail-component v-on:update="getEmployees" :employee="employee" :close="close">

                        </employee-detail-component>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
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
                orderParam:'id',
                filterParam:'',
                }
        },
        mounted() {
            this.getEmployees();
        },
        methods:
            {
                getEmployees: function(page)
                {
                    axios.get('api/employees?orderParam=',{
                        params:{
                            page,
                            orderParam:this.orderParam
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
                        alertify.confirm('Delete Employee', 'Are you sure to delete this employee?', function(){ alertify.success('Deleted') }
                            , function(){ alertify.error('Cancel ')});

                    });
                },
                filterSearch:function(){
                    const result = this.employees.filter(
                        response=>response.name==this.filterParam || response.surname==this.filterParam || response.age==this.filterParam
                        || response.id==this.filterParam || response.position.language ==this.filterParam || response.position.language ==this.filterParam
                    )
                    if(result=='')
                    {
                        this.getEmployees()
                    }
                    return this.employees=result

                }
            }
    }
</script>

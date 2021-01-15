<template>
    <div v-show="close">
        <div class="card-header bg-dark text-white" style="font-size: 1.1em">
           {{ employee.name }}
            <span v-on:click.prevent="closeDetail" class="btn btn-dark float-right text-white" style="padding: 0.2em 0.8em !important;">
                X
            </span>
        </div>
        <div class="card-body m-auto">
            <form class="row" action="">
                <div class="col-6">

                    <div class="form-group">
                        <label class="form-control-label" for="">Employee Id</label>
                        <input  v-model="employee.id" class="form-control" type="number">
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="">Name</label>
                        <input  v-model="employee.name" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="">Surname</label>
                        <input  v-model="employee.surname" class="form-control" type="text" >
                    </div>

                     <div class="form-group">
                        <div v-if="employee.position.type">
                            <label class="form-control-label" for="">Position
                                <input type="text" readonly="readonly" value="Designer">
                            </label>
                            <label class="form-control-label" for="">Type
                                <input type="text" v-bind:language="employee.position.type" v-model="employee.position.type">
                            </label>
                        </div>

                        <div v-else>
                            <label class="form-control-label" for="">Position
                                <input type="text"  readonly="readonly" value="Developer">
                            </label>
                            <label class="form-control-label" for="">Language
                                <input type="text" v-bind:language="employee.position.language" v-model="employee.position.language">
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button v-on:click="update(employee)" class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="form-group">
                        <label class="form-control-label" for="">Age
                            <input v-model="employee.age" class="form-control" type="number">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="">Discharge Date
                            <div>{{employee.created_at}}</div>
                        </label>
                        <label class="form-control-label ml-3" for="">Modified Date
                            <div>{{employee.updated_at}}</div>
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    name: "EmployeeDetailComponent",
    props:['employee','close'],
    data(){
        return{
            developer:'Developer',
            designer:'Designer',
            name:'',
            surname:'',
            position:'',
            language:'',
            type:'',
            age:'',
        }
    },
    methods:{
        closeDetail:function()
        {
            this.close=false
        },
        update:function(employee)
        {
            if(!employee.position.type)
            {
                this.position = 'developer'
            }
            else{
                this.position = 'designer'
            }

            axios.put('api/employees/'+employee.id,{
                id: employee.id,
                name: employee.name,
                surname:employee.surname,
                age:employee.age,
                position:this.position,
                language:employee.position.language,
                type:employee.position.type
            }).then(response=>{
                if(response.status === 201)
                {
                    alert('Updated success')
                }

            })

        }
    }

}
</script>

<style scoped>

</style>

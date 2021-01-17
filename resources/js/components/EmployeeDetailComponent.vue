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
                        <input  v-model="employee.id" class="form-control" type="number" readonly="readonly">
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
                                <select v-model="employee.position.type" class="form-control" name="type">
                                <option value="web">Web</option>
                                <option value="graphic">Graphic</option>
                                </select>
                            </label>
                        </div>

                        <div v-else>
                            <label class="form-control-label" for="">Position
                                <input type="text"  readonly="readonly" value="Developer">
                            </label>
                            <label class="form-control-label" for="">Language
                                <select  v-model="employee.position.language" class="form-control" name="language">
                                    <option value="php">Php</option>
                                    <option value="net">Net</option>
                                    <option value="python">Python</option>
                                </select>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button v-on:click.prevent="update(employee)" class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="form-group">
                        <label class="form-control-label" for="">Position Id
                            <input v-model="employee.position.id" class="form-control" type="number" readonly="readonly">
                        </label>
                    </div>
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
            fields:{},
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
            this.closeDetail()

            axios.put('api/'+this.position+'/'+employee.position.id,{
                id:employee.id,
                company_id:employee.company_id,
                name: employee.name,
                surname:employee.surname,
                position_id:employee.position.id,
                age:employee.age,
                language:employee.position.language,
                type:employee.position.type
            }).then(response=>{
                if(response.status === 201)
                {
                   alertify.alert('Updated success')
                    this.$emit('update')

                }

            })

        }
    }

}
</script>

<style scoped>

</style>

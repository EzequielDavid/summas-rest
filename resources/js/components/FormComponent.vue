<template>
    <div class="container mb-5">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <button class="btn btn-success mr-3" v-on:click="enterNewForm">Enter New</button>
                Enter new Employee
            </div>
            <div v-show="enterNew" class="card-body col-12">
                <form class="row" action="">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-control-label" for="">Company Id</label>
                            <input  v-model="fields.company_id" readonly class="form-control" type="number">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="">Name</label>
                                <input  v-model="fields.name" class="form-control" type="text">
                                <div class="alert alert-danger" v-if="errors && errors.name">{{errors.name[0]}}</div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="">Surname</label>
                                <input  v-model="fields.surname" class="form-control" type="text" >
                            <div class="alert alert-danger" v-if="errors && errors.surname">{{errors.surname[0]}}</div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="">Position
                                <select v-model="fields.position" class="form-control" name="position">
                                    <option value="developer" selected>Developer</option>
                                    <option value="designer">Designer</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label v-if="fields.position === 'developer'" class="form-control-label" for=""> Language
                                <select  v-model="fields.language" class="form-control" name="language">
                                    <option value="php">Php</option>
                                    <option value="net">Net</option>
                                    <option value="python">Python</option>
                                    <div class="alert alert-danger" v-if="errors && errors.language">{{errors.language[0]}}</div>
                                </select>
                            </label>
                            <label v-else-if="fields.position === 'designer'" class="form-control-label" for=""> Type
                                <select  v-model="fields.type" class="form-control" name="type">
                                    <option value="web">Web</option>
                                    <option value="graphic">Graphic</option>
                                    <div class="alert alert-danger" v-if="errors && errors.type">{{errors.type[0]}}</div>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <button v-on:click.prevent="send" class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="">Age
                                <input v-model="fields.age" class="form-control" type="number">
                                <div class="alert alert-danger" v-if="errors && errors.age">{{errors.age[0]}}</div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "FormComponent",
    data(){
        return{
            fields:{company_id:1},
            enterNew:false,
            errors:{},
        }
    },
    mounted() {
        this.send();
    },
    methods:{
        send:function (){
            axios.post('api/'+ this.fields.position,this.fields).then(response=>{
                this.fields={}
                if(response.status === 201)
                {
                    this.$emit('enterNew')
                    alertify.alert('Created Success')
                    this.enterNew=false;
                    this.errors={}
                }
            }).catch(error=>{
                if(error.response.status===422)
                {
                    this.errors= error.response.data.errors
                }

            });
        },

        enterNewForm:function (){
            this.enterNew = this.enterNew === false;
            console.log(this.enterNew)
        },

    }
}
</script>

<style scoped>

</style>

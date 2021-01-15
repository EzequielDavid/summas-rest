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
                            <label class="form-control-label" for="">Name</label>
                                <input  v-model="name" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="">Surname</label>
                                <input  v-model="surname" class="form-control" type="text" >
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="">Position
                                <select v-model="position" class="form-control" name="position">
                                    <option value="developer" selected>Developer</option>
                                    <option value="designer">Designer</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label v-if="position === 'developer'" class="form-control-label" for=""> Language
                                <select  v-model="language" class="form-control" name="language">
                                    <option value="php">Php</option>
                                    <option value="net">Net</option>
                                    <option value="python">Python</option>
                                </select>
                            </label>
                            <label v-else-if="position === 'designer'" class="form-control-label" for=""> Type
                                <select  v-model="type" class="form-control" name="type">
                                    <option value="web">Web</option>
                                    <option value="graphic">Graphic</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <button v-on:click="send" class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="form-group">
                            <label class="form-control-label" for="">Age
                                <input v-model="age" class="form-control" type="number">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "FormComponent",
    data(){
        return{
            name:'',
            surname:'',
            position:'',
            language:'',
            type:'',
            age:'',
            enterNew:false,
        }
    },
    mounted() {
        this.send();
    },
    methods:{
        send:function (){
            axios.post('api/employees',{
                name:this.name,
                surname:this.surname,
                age:this.age,
                position:this.position,
                language:this.language,
                type:this.type
            }).then(response=>{
                if(response.status === 201)
                {
                    alert('created success')
                }
            })
        },

        enterNewForm:function (){
            if(this.enterNew===false)
            {
                this.enterNew=true;
            }
            else{
                this.enterNew=false
            }
            console.log(this.enterNew)
        }

    }
}
</script>

<style scoped>

</style>

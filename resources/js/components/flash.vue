<template>
    <div class="alert alert-success alert-flash alert-block" v-show="show">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong> success !{{ body }}</strong>
</div>
</template>


<script>

export default{
    data(){
        return{
            props:['message'],
            body:this.message,
            show:false
        }


    }
}

</script>

<style>
    .alert-flash{
        position: fixed;
        right: 25px;
        bottom: 25px;
    }
</style>



<template>
	<div class="container">
		<h1>{{(flag? 'Your are logged in!': 'Welcome Guest!')}}</h1>
		
	</div>
</template>


<script>
	export default {
		data(){
			return {
				
				
			}
		},
		
	}
</script>
<style scoped>
.container{
	background: #f2f2f2;
	padding: 10px;
}
</style>

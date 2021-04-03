// import axios from "axios";

const actions = {
    getMemes({commit}){
        let responseData = {};
         return axios.get('api/getMemes').then(
            response=>{
             responseData = response.data;
            }
        )

        console.log(responseData)
        commit('setMemes',responseData)
    },
}

// import axios from "axios";

const actions = {
    getMemes({commit},payload){
        var responseData;
          axios.get(payload.endpoint,{params:payload.body}).then(
            response=>{
                responseData = response.data;
            }
        )
        commit('setMemes',responseData)
    },
}

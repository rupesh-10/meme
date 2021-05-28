// import axios from "axios";

const actions = {
   async getMemes({commit}, payload){
        await axios.get('api/memes').then(
            response=>{
              payload = response.data.memes;
            }
        )

        console.log(payload);
        commit('setMemes',payload)
        return payload;
    },
}
export default actions;

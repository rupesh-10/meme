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

    async like({commit},memeId){
      await axios.get("/api/like/" + memeId).then(response => {      
          commit('setLikes',memeId)
          console.log(response.data);
      }).catch(errors => {
          if (errors.response.status == 401) {
              window.location = "/login";
          }
      });
    },

    async dislike({commit},memeId){
      await axios.get("/api/dislike/" + memeId)
      .then(response => {
          commit('setDislikes',memeId)
          console.log(response.data);
      })
      .catch(errors => {
          if (errors.response.status == 401) {
              window.location = "/login";
          }
      });
    }


}
export default actions;

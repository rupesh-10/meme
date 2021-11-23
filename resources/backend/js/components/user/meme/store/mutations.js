const mutations = {
    /**
     * Set the default value of the endpoints.
     *
     * @param {Object} state
     * @param {Object} payload
     *
     * @return void
     */
    setMemes(state,memes){
        state.memes = memes;
    },
    setLikes(state,memeId){
        state.memes.find(meme=>meme.id===memeId).liked = !state.memes.find(meme=>meme.id===memeId).liked
        if(state.memes.find(meme=>meme.id===memeId).disliked) {
            state.memes.find(meme=>meme.id===memeId).disliked = false
        }
       
    },
    setDislikes(state,memeId){
        state.memes.find(meme=>meme.id===memeId).disliked = !state.memes.find(meme=>meme.id===memeId).disliked
        if(state.memes.find(meme=>meme.id===memeId).liked){
            state.memes.find(meme=>meme.id===memeId).liked = false
        }
    }
};
export default mutations;

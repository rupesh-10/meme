 <template>
 <div class="row justify-content-center mt-4">
        <div class="col-md-7 col-sm-12" v-for="meme in memes" :key="meme.id">
            <div class="card">

                <div class="card-body">
                 <a class="text-dark text-decoration-none tex-body d-flex flex-row" href="">
                    <img :src="'/images/profile.png'" class="rounded-circle" width="70" height="70">
                    <h4 class="mt-4 ml-3">{{ user.name }} </h4>
                </a>
                </div>
                <hr>

                <div class="card-body p-0 m-0">

                <div class="caption  pl-3 row">

                   <p class="col-md-9 col-sm-7">{{ meme.caption }} </p>

                    <!-- <h6 class="text-secondary col-md-3 col-sm-3 text-center"><i class="fa fa-globe pr-1"></i><Strong>{{ meme.postedAgo() }}</Strong></h6> -->
                </div>

                <div class="meme-media p-0 m-0" v-if="meme.image">
                    <img :src="'/storage/'.meme.image" class="w-100" style="max-height:633px; max-width:633px;">
                </div>

                <!-- <div class="text-center p-3 d-flex">

                <like-component meme-id="{{ $meme->id }} liked= {{ meme.like() }}"></like-component>   <span class="pl-2">{{ $meme->totalLikes() }}</span>
                   <a class="p-2 d-flex text-dark" data-toggle="collapse" href="#comment{{ $meme->id }}" role="button" aria-expanded="false" aria-controls="collapseExample"> <i class="far fa-comment fa-2x text-secondary"></i><span class="pl-2"> {{ count($meme->comments) }} </span></a>
                  <dislike-component meme-id="{{ $meme->id }}" disliked={{ $meme->disliked() }}></dislike-component><span class="pl-2">{{ $meme->totalDislikes() }}</span>
                </div> -->
                <!-- <div class="collapse" id="comment{{ $meme->id }}">
                    <div class="card card-body">
                        <form action="{{ action('CommentController@store',$meme->id) }}" method="post">

                        <input name="comment" class="form-control rounded" placeholder="Write a comment" style="border-radius:20px;">
                        </form>
                    </div> -->

                    <!-- <h4 class="ml-4 mt-2" v-show="meme.comments">Comments: </h4> -->
                    <!-- <div class="m-3 px-2 pt-2" style="width:fit-content; max-width:100%; border-radius:20px;
                    box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);
                      transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);" v-for="comment in meme.comments" :key="comment.commentator.name">

                        <div class="d-flex" style="">
                            <img class="rounded-circle" :src="comment.commentator.profile.profileImage()" width="30" height="30">
                            <h6 class="pl-2 pt-1" style="font-weight: 800;">{{ comment.commentator.name }}</h6>
                        </div>
                        <div class="ml-4 pl-1">
                           <span class="p-1 commentContent{{ $comment->id }}" style="font-size:15px;"> {{ comment.content }} </span>
                           <!-- <form class="editComment{{ $comment->id }}" action="{{ action("CommentController@update",$comment->id) }}" style="display:none;" method="post">
                            @method("post")
                            @csrf
                           <input class="form-control rounded" type="text" value="{{ $comment->content }}" name="content">
                           <a class="cancel pl-2" data-id="{{ $comment->id }}" style="cursor: pointer;">Cancel</a>
                           </form> -->
                        </div>
                    </div> -->
                      <!-- <div class="d-flex ml-3 pl-2 pb-1">
                            <strong>{{ $comment->commentedAgo() }}</strong
                                <a href="#" class="pl-2">Like</a>
                                <a class="pl-2" href="#">Reply</a>
                                @can('update',$comment)
                                <div class="btn-group dropright">
                                <a class="pl-2 popup" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="true"><i class="fas fa-ellipsis-h" style="font-size:19px;"></i></a>
                                <div class="ml-2 dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="ml-2 edit" data-id="{{ $comment->id }}" style="cursor: pointer;"><i class="fa fa-edit" href=""></i> Edit</a>
                                    <a class="ml-2 delete" data-toggle="modal" data-target="#smallModal" style="cursor: pointer;"><i class="fa fa-trash"></i> Delete</a>
                                </div>
                                </div>
                                <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Delete Comment</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you sure you want to delete this comment?</h5>
                                            <form action="{{ action("CommentController@destroy",$comment->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                                <div class="text-right">
                                                <a  class="text-info" data-dismiss="modal" style="cursor: pointer;"><strong>Cancel</strong></a>
                                                <button class="btn btn-primary ml-2">Confirm</button>
                                                </div>
                                             </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                @endcan
                        </div> -->
                </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted(){
        this.getMemes();
    },
    data :function(){
        return {
            memes : {},
            user:{},
        }
    },
    methods: {
        getMemes:function(){
            axios.get('/api/getMemes').then(res=>{
                this.memes = res.data.memes;
                this.user = res.data.user;
            })
        },
    },

}
</script>

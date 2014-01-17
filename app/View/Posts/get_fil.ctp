<?php echo $this->Session->flash(); ?>
    <div class="row">
      <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Timeline - Publications | <h5 class="pull-right"><?php echo date('Y-m-d'); ?></h5>
            </header>

            <!--form post-->
            <div class="panel-body profile-activity">
               <?php echo $this->Form->create('Post',array('class'=>'polling content-text','type'=>'file','id'=>'postinfo','url'=>array('controller'=>'Posts','action'=>'AddPost'))); ?>
                 <?php echo $this->Form->input('name', array('type'=>'hidden',"autocomplete"=>"off")); ?>
                 <?php echo $this->Form->input('user_id', array('type'=>'hidden',"autocomplete"=>"off")); ?>
                 <?php echo $this->Form->input('type_id', array('type'=>'hidden',"autocomplete"=>"off")); ?>
                <div class="col-lg-3 post resize">
                      <?php if (!$this->Session->check('Auth.User.Avatar.0.url')): ?>
                         <?php echo $this->Html->image('http://dummyimage.com/52x48/bbb/05071f.png&text=avatar'); ?>
                      <?php else: ?>
                         <?php echo $this->Image->resize($this->Session->read('Auth.User.Avatar.0.url'),48,48); ?>
                      <?php endif; ?>
                 </div>
                 <div class="col-lg-9">
                   <?php echo $this->Form->input('content',array('label'=>false,'id'=>'body_post','class'=>'form-control')); ?>
                 </div> 
                 <div class="clearfix"></div>
                 <div class="loader pull-left"><?php echo $this->Html->image('ajax-loader.gif');?></div> 
                 <?php echo $this->Form->button('Poster', array('type'=>'submit','class'=>'btn btn-info pull-right','id'=>'poster')); ?>
                 <?php echo $this->Form->end();?>
            </div>
            <!--form end post-->
            <!--debut d'affichage des post   et commentatire-->

            <div class="panel-body profile-activity" id="activity">
                <div class="loading"><?php //echo $this->Html->image('ajax-loader.gif');?></div>
                 <div class="cacher" id="template">
                  <!--Liste des postes nouvellements ajouter-->
                    <div class="lastPost" id="lastPost"></div>
                  <!--end des postes nouvellemepnt ajoutet-->

                     <?php foreach ($postList as $k => $post): $avat = $post['User']['Avatar']; $comment = $post['Comment']; ?>
                      <div class="panel-body profile-activity">
                        <div class="publication">
                          <?php if(empty($avat)): ?> 
                                <div class="col-lg-2">
                                  <?php echo $this->Html->image('http://dummyimage.com/52x48/bbb/05071f.png&text=avatar'); ?>
                                </div>
                          <?php else: ?>
                                <?php foreach ($avat as  $v): ?>
                                  <div class="col-lg-2">
                                        <?php echo $this->Image->resize($v['url'],48,48);?>
                                  </div>
                                <?php endforeach; ?>
                          <?php endif; ?>
                        <div class="col-lg-10 text-publication">
                            <h5><?php echo $post['Post']['name']; ?></h5>
                                <p> <?php echo $post['Post']['content']; ?></p>
                            <div class="col-lg-10 action">
                              <span><a href="#" class="pull-left">S'abonner</a></span> <span class="pull-right"><a href="#body_comment<?php echo $post['Post']['id'];?>">Commenter </a>|  <abbr class="timeago" title="<?php echo $post['Post']['updated'];?>"> <i class="icon-time"></i> <?php echo $post['Post']['updated']; ?></abbr></span>
                            </div>
                          </div>
                        </div>
                        <div class="clearfix"></div>

                       <!--comment list-->
                        <div class="comment-content">
                          <?php foreach ($comment as $f => $c): $ava = $c['User']['Avatar']; ?>
                              <div class="box-comment">
                                 <button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
                                 <div class="col-lg-2">
                                   <?php if(empty($ava) || empty($comment)):?>
                                        <?php echo $this->Html->image('http://dummyimage.com/52x48/bbb/05071f.png&text=avatar'); ?>
                                   <?php else: ?>
                                         <?php foreach ($ava as $j => $i): ?>
                                             <?php echo $this->Image->resize($i['url'],48,48); ?>
                                         <?php endforeach; ?>
                                   <?php endif; ?>
                                 </div>
                                 <?php if(!empty($c)): ?>
                                   <div class="col-lg-10"><strong> <a href="#"> <?php echo $c['User']['username']; ?></a> </strong> <?php echo $c['content']; ?></div>
                                   <p></p>
                                 <?php endif;?>
                              </div>
                              <div class="clearfix"></div>
                          <?php endforeach; ?>
                        </div>
                         <!--end comment list-->

                        <ul id="comment-list"></ul>
                        <!--formulaire comment-->
                         <?php echo $this->Form->create('Comment',array('url'=>array('controller'=>'Comments','action'=>'AddComment'),'class'=>'polling content-text2','id'=>'Commentinfo')); ?>
                              <?php echo $this->Form->input('user_id', array('type'=>'hidden')); ?>
                             <?php echo $this->Form->input('post_id',array('value'=>rand().'_/#'.$post['Post']['id'],'type'=>'hidden','label'=>false,"autocomplete"=>"off")); ?>
                              <div class="col-lg-3 post resize">
                                        <?php if (!$this->Session->check('Auth.User.Avatar.0.url')): ?>
                                           <?php echo $this->Html->image('http://dummyimage.com/52x48/bbb/05071f.png&text=avatar'); ?>
                                        <?php else: ?>
                                           <?php echo $this->Image->resize($this->Session->read('Auth.User.Avatar.0.url'),48,48); ?>
                                       <?php endif; ?>
                               </div>
                           <div class="col-lg-9"> <?php echo $this->Form->input('content',array('label'=>false,'rows'=>3,'cols'=>8,'placeholder'=>'Laissez un commentaire !','id'=>'body_comment'.$post['Post']['id'])); ?></div> 
                           <div class="clearfix"></div>
                           <div class="loading"><?php echo $this->Html->image('ajax-loader.gif');?></div> 
                         <?php echo $this->Form->button('Send', array('type'=>'submit','class'=>'btn btn-info pull-right','id'=>'comment-id')); ?>
                         <?php echo $this->Form->end();?>
                        <!--end formulaire content-->
                      </div>
                     <?php endforeach; ?>
                </div>
            </div>
            <!--fin d'affichage des post et commentatire-->
        </section>
      </div>

      <div class="col-lg-4">
          <section class="panel" id="chats">
              <header class="panel-heading">
                  Business | Annonces
              </header>
              
          </section>
      </div>
      <!---chats les connectés-->
      <div class="col-lg-2">
          <section class="panel" id="chats">
              <header class="panel-heading">
                Bientôt disponible
              </header>
          </section>
      </div>
    </div>
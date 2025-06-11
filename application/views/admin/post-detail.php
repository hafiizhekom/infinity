 <?php echo $this->session->flashdata("notifikasi");?>
 <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                            Admin Panel <small>Post</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active"> <a href="<?php echo base_url($admin_page.'/post'); ?>">Post</a>
                                </li>
                                <li class="active"> Edit
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container-fluid">
                                <form  method="POST" action="<?php echo current_url(); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Judul" name="judul_post" value="<?php echo $post->result()[0]->judul; ?>" required>
                                    </div>
                                    <div class="form-group">
                                         <textarea id="summernote" rows="12" name="postedit"><?php echo $post->result()[0]->isi; ?></textarea>
                                    </div>
                                    <input type="hidden" name="idpost" value="<?php echo $post->result()[0]->id; ?>">
                                    <input type="hidden" name="typepost" value="<?php echo $post->result()[0]->type_events; ?>">
                                    <button type="submit" name="edit" value="submit" class="btn btn-primary pull-right">Update Post</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
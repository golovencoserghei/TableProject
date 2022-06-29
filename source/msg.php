<?

function msg($msg,$type)
{
  if($type=='wr'){
	echo "
	<div class='alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show' role='alert'>
	                                        <span class='alert-icon-wrap'><i class='fa fa-exclamation-triangle'></i></span>".$msg."
	                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                                            <span aria-hidden='true'>&times;</span>
	                                        </button>
	                                    </div>
                              ";
                            }
  if($type=='good'){
	echo "
  <div class='alert alert-inv alert-inv-primary alert-wth-icon alert-dismissible fade show' role='alert'>
                                          <span class='alert-icon-wrap'><i class='zmdi zmdi-mood'></i></span>".$msg."
                                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                              <span aria-hidden='true'>&times;</span>
                                          </button>
                                      </div>
                              ";
                            }
  if($type=='ok'){
	echo "
  <div class='alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show' role='alert'>
                                        <span class='alert-icon-wrap'><i class='zmdi zmdi-check-circle'></i></span>".$msg."
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>

                              ";
                            }
  if($type=='err'){
	echo "
  <div class='alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show' role='alert'>
                                        <span class='alert-icon-wrap'><i class='zmdi zmdi-alert-circle-o'></i></span>".$msg."
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>

                              ";
                            }

}

?>
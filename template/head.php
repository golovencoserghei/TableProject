<?
$mobuser=mobdev($user_agent);

?>

<nav class="navbar navbar-expand-xl navbar-dark fixed-top hk-navbar">
           <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
           <a class="navbar-brand" href="index.html">
               <img class="brand-img d-inline-block"  width="84" height="34" src="img/<? if ( $spage=='report'){echo 'rlogo' ;} else {echo 'slogo' ;}  ?>.png" alt="brand" />
           </a>
           
           <ul class="navbar-nav hk-navbar-content">

               <li class="nav-item">
                   <a class="nav-link nav-link-hover" href="profile.html"><span class="feather-icon"><i data-feather="settings"></i></span></a>
               </li>





               <li class="nav-item dropdown dropdown-authentication">




                   <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <div class="media">
                           <div class="media-img-wrap">


                           </div>
                           <div class="media-body">
                               <span><?echo $user_arr[8];?><i class="zmdi zmdi-chevron-down"></i></span>
                           </div>
                       </div>
                   </a>





                   <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">


                       <a class="dropdown-item" href="logout.html"><i class="dropdown-icon zmdi zmdi-power"></i><span>Выход</span></a>
                   </div>
               </li>



           </ul>
       </nav>
	   
	   
<?


if ( $mobuser=='Mobile' AND $user_arr['rid']==21)
{
?>



	  
<nav class="navbar fixed-bottom">
         
		 
	
<div class="mx-auto">
 <div class="row">
<div class="col-sm">
 
                                    
    <a style="color: #000000;" href="index.html"><button type="button" class="btn btn-<? if ( $spage=="index" or $spage=='indexw' ){echo 'secondary' ;} else {echo 'light' ;} ?> "><i class="fa fa-table fa-2x"></i></button></a>
    <a style="color: #000000;" href="report.html"><button type="button" class="btn btn-<? if ( $spage=='report'){ echo 'secondary'; }  else {echo 'light' ;} ?>"><i class="fa fa-pencil fa-2x"></i></button> </a>
    
	<?
	if($user_arr[4]==9 or $bmenu==1){
		
		
	
	
	?><a style="color: #000000;" href="schedule.html"><button type="button" class="btn btn-<? if ( $spage=='schedule'){echo 'secondary' ;} else {echo 'light' ;}  ?>"><i class="fa fa-calendar fa-2x"></i></button></a>
    
	<a style="color: #000000;" href="plot.html"><button type="button" class="btn btn-<? if ( $spage=='plot'){echo 'secondary' ;} else {echo 'light' ;} ?>"><span class='fa-stack'>
                                                              <i class='fa fa-map-o fa-stack-2x'></i>
                                                              <i class='fa fa-map-marker fa-stack-1x'></i>
                                                              </span></button></a>
       <?
	   
	}
	
	
	if($user_arr[4]==9)
	{
		?> 
		<a style="color: #000000;" href="admin.html"><button type="button" class="btn btn-<? if ( $spage=="admin" ){echo 'secondary' ;} else {echo 'light' ;} ?> "><i class="fa fa-tachometer fa-2x"></i></button></a>
    <?
	}
	   ?>                                
</div>
                          

 
</div>
</div>

 
           

</nav>








<?

}
           			require_once("template/menu.php");
					
$prot_get=mysql_fetch_array(mysql_query("SELECT * FROM `us_session` WHERE `ip`='".$ip."' or `sessid` = '".$_COOKIE['PHPSESSID']."'"));
if($prot_get['ban']==1){
	
	msg("вы забанены","wr");
}
           			?>

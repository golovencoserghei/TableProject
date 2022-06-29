<?
// communication
$int_ps = 'Password';
$int_ps2 = 'Repeat password';
$int_login = 'Login';

$bt_su_reg = 'Registration';
$bt_crea = 'Registration';
$bt_su_rc = 'Forgot your password?';
$bt_rec = 'Restore';
$bt_exit = 'Exit';
$bt_su_in = 'Log In';
$bt_su_sv = 'Save';
$bt_su_ban = 'Block';
$bt_su_unban = 'Unlock';
$bt_su_del = 'Delete';

$gend_qr = 'Sex';
$gend_no = 'Not specified';
$gend_m = 'Male';
$gend_f = 'Female';

$bt_return = '<< Back';
$bt_main_group = 'Main Group';
// ------------------ //


// days of the week
$wk_mo = 'Monday';
$wk_tu = 'Tuesday';
$wk_we = 'Wednesday';
$wk_th = 'Thursday';
$wk_fr = 'Friday';
$wk_sa = 'Saturday';
$wk_su = 'Sunday';
$wk_aa = 'Always Available';

$tx_tel = 'Tel.';
// ------------------ //


// Login page
$hd_wl = 'Welcome!';
$hd_nm = 'Stand Table';


// messages //
$err_ic_lp = 'Fill in all the fields';
$err_ic_da = 'Data entered is not correct';
$err_ic_log = 'A user with such login and password was not found!';
// ------------------ //


// Registration Page
$reg_hd_tx = 'Create Account';
$reg_name = 'Last Name First Name';

// messages //
$err_reg_fd = 'Fill in all required fields - Name, Login, Gender, Password';
$err_reg_mail = 'Email entered incorrectly';
$err_reg_pass = 'Password must be longer than 6 characters';
$err_reg_inf_pass = 'The password should consist of uppercase or lowercase letters of the Latin alphabet and numbers A-Z, a-z, 0-9';
$err_reg_pp2 = 'Passwords do not match';
$err_reg_psl = 'The password must not be longer than 30 characters';
$err_reg_gend = 'Specify gender';
$err_reg_is = 'A user with this Email is already on the site';

// ------------------ //


// Password Recovery Page

$rem_inf = 'Please insert below your email address, which was indicated in your registration.  A letter is going to come to your E-mail which will contain a new password.';


// ------------------ //


// Profile Page
$pr_hd_tt = 'Profile Settings';
$pr_hd_inf = 'Basic Information (Your ID';

$pr_in_inf = 'Active authorizations';
$pr_in_tbt1 = 'IP';
$pr_in_tbt2 = 'Login Time';
$pr_in_tbt3 = 'Device Type';
$pr_in_tbt4 = 'Actions';


$pr_his_inf = 'Log In History';
$pr_his_tb1 = 'Log In Time';
$pr_his_tb2 = 'IP';
$pr_his_tb3 = 'OS';
$pr_his_tb4 = 'Device Type';
$pr_his_tb5 = 'Actions';

$pr_dev_inf = 'Secure Devices';

$pr_dp_inf = 'Change personal information';
$pr_dp_name = 'Last Name First Name (Change)';
$pr_dp_email = 'Your mail address';
$pr_dp_email_inf = 'Last Name First Name (Change)';
$pr_dp_tel1 = 'Phone number';
$pr_dp_tel2 = 'Phone number';



$pr_lg_hd = 'Change Language';
$pr_lg = 'Language';


$pr_ps_inf = 'Change Password';
$pr_ps_old = 'Old Password';
$pr_ps_ed1 = 'New password';
$pr_ps_ed2 = 'Repeat';








// ------------------ //






//Top Menu
$menu_prim_tables = 'List';
$menu_prim_ader = 'Management';
$menu_prim_rep = 'Report';
$menu_prim_orar = 'Schedule';
$menu_prim_sector = 'Plot';
$menu_prim_broadcast = 'Broadcast';
$menu_prim_exit = 'Exit';


$menu_tbsub_none = 'No Tables Available';


// administration menu

// item -> meeting
$menu_admin_congr = 'Meeting';
$menu_admin_publ = 'Publishers';
$menu_admin_group = 'Groups';



// item -> Charts
$menu_admin_grf = 'Chart';
$menu_admin_g_cr = 'Create a new chart';


// item -> Reports
$menu_admin_rep = 'Report';
$menu_admin_cgrp = 'Meeting report';

// point -> Plots
$menu_admin_plot = 'Plots';
$menu_admin_cgplot = 'Meeting Place';

// Table Management
$menu_tb_hed = 'Admin Tables';
$menu_tb_aut = 'Manage Tables';
$menu_tb_crtb = 'Create a new table';
$menu_tb_add = 'Add / Beat publisher ';
$menu_tb_hist = 'Activity History';




// ------------------ //



//--------
// удалить запись - delete note
// 

// записаться (внести заметку)- make a note







// Stand Table Page
$st_hd_tw = 'From ';
$st_hd_tw2 = ' to ';
$st_stn = ' / place: ';
$st_cgr = 'Congregation: ';

$st_thw = 'Current week';
$st_nxw = 'Next Week';
$st_pbh = 'Publishers';
$st_infrap = 'Weekly report';
$st_tbpd = 'Publisher';
$st_tm = 'Time';
$st_rap = 'Report';



$st_rap_pb = 'Public.';
$st_rap_pv = 'Video';
$st_rap_pp = 'Repeats';
$st_rap_iz = 'Studies';








$st_inf_no = 'There is no ministry with trolleys this day';
$st_inf_stn = 'You are not added to the table.';

$st_inf_hd = 'Information!';
$st_inf_hd2 = 'Please tell your ID to the responsible <p> brother in your meeting.';
$st_inf_hd3 = 'Your ID:';




// ------------------ //


// Stand selection page (setting)
$sst_tit = 'Trolleys timetable settings';
$sst_hd1 = 'Select a necessary item';

//удаленные таблицы - delited timetables
//Название Удаленой Таблицы - name of delited timetables


// stand setup page Table.html-> tbed
$tbed_1 = 'Editing tables';
$tbed_2 = 'Places of the trolleys';
$tbed_3 = 'Change place';
$tbed_4 = 'Time settings';
$tbed_5 = 'Choose the day of the week';
$tbed_6 = 'If there is no ministry one or several days during the week, select this day from the list. Input below  "00:00". It will cancel ministry this day. "'.$st_inf_no.'" will be displayed on the timetable.';
$tbed_7 = 'It is very importent to insert correctly the time settings. The time must be written in a line through the separator "|" (time|time|time|time). Example: 08: 00 | 09: 00 | 10:00 | 11: 00 | 12: 00 ';
$tbed_8 = 'timetable Functions';
$tbed_9 = 'Publishers can delete or insert themselves in the timetable';
$tbed_10 = 'Service Report';
$tbed_11 = 'Threesome service';
$tbed_12 = 'Comgregation report';
$tbed_13 = 'Оrientation of the table - vertically (if the function is not enabled, the orintation well be horizontal)';
$tbed_14 = "Access to the next week timetable";
$tbed_15 = 'Choose a day of the week';
$tbed_16 = 'Make timetable active';
$tbed_17 = 'Timetable Operation';
$tbed_18 = 'Select from the list';
$tbed_19 = 'Choose a state';
$tbed_20 = 'Delete timetable';
$tbed_21 = 'Choose an action';
$tbed_22 = 'Warning!';
$tbed_23 = 'The Deleting of the timetable leads to the loss of all data.';
$tbed_24 = 'Active';
$tbed_25 = 'Inactive';



//



// Lock Page (BAN)
$ban_hd = 'Account Locked Out';
$ban_tx = 'To unblock your account, contact the responsible Brother for information.';



// ------------------ //


// member.html


$mb_ttlinf = 'To add publishers, create a meeting table. Management tab >> Create a new table (then follow the instructions on the page). ';


$mb_ttl1b = 'Add a new publisher to the collection';
$mb_carttl1b = 'Add a new publisher to the meeting';
$mb_forminps1 = 'Enter publisher ID';
$mb_formbtn = 'Add';


$mb_ttl2b = 'Create profile for new publisher';

$mb_gender = 'Gender';
$mb_lista = 'List of meeting publishers';
$mb_tb_in = 'Stopped';
$mb_tb_ban = 'Blocked';


// page to add the user to the table
$adduser_1 = 'Adding to Group No.';
$adduser_2 = 'responsible';
$adduser_3 = 'All publishers who belonged to group No.';
$adduser_4 = 'will be deleted and will be available for re-adding to the group.';
$adduser_5 = 'Delete group';
$adduser_6 = 'Run';
$adduser_7 = 'Add publisher to table';
$adduser_8 = 'Select the table to which you want to add the publisher';
$adduser_9 = 'The publisher of which you want to add to the table should tell you your ID (settings tab >> at the top "BASIC INFORMATION (YOUR ID)"
the numbers are highlighted in red.
The received ID from the publisher must be entered in the field below and click "Add publisher".
After adding, the publisher must refresh the table page and the table becomes available to him. ';
$adduser_10 = 'Add Publisher';
$adduser_11 = 'Remove publisher from table';
$adduser_12 = 'Select the table from which you want to remove the publisher';
$adduser_13 = 'Information!';
$adduser_14 = 'To remove the Detector from the table, specify its ID below in the field (>> how to determine the publisher ID? go to the table (from which you need to remove the publisher) >> above the tabs
select week press "Publishers"
before the surname of each publisher, the table shows its ID.
After deletion, the table will no longer be available to the publisher. ';
$adduser_15 = 'Add publisher to meeting group';
$adduser_16 = 'Your collection:';
$adduser_17 = 'The publisher of which you want to add to the meeting group must tell you your ID
(settings tab (gear icon in the upper right corner) >> at the top "BASIC INFORMATION >> YOUR ID)" the numbers are highlighted in Red.
The received ID from the publisher must be entered in the field below and click "Add publisher".
After adding, the publisher must refresh the table page and the table becomes available to him. ';
$adduser_18 = 'Announcer ID';
$adduser_19 = 'already added to table';
$adduser_20 = 'successfully added to table';
$adduser_21 = 'has been deleted from the table';
$adduser_22 = 'was added to the Meeting';
$adduser_23 = 'cannot be added to';
$adduser_24 = 'since he is a member of another assembly.';
$adduser_25 = 'has been added to the Meeting';


//











?>
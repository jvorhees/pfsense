<?php
/*
        $Id$
        Copyright 2007 Scott Dale
        Part of pfSense widgets (www.pfsense.com)
        originally based on m0n0wall (http://m0n0.ch/wall)

        Copyright (C) 2004-2005 T. Lechat <dev@lechat.org>, Manuel Kasper <mk@neon1.net>
        and Jonathan Watt <jwatt@jwatt.org>.
        All rights reserved.

        Redistribution and use in source and binary forms, with or without
        modification, are permitted provided that the following conditions are met:

        1. Redistributions of source code must retain the above copyright notice,
           this list of conditions and the following disclaimer.

        2. Redistributions in binary form must reproduce the above copyright
           notice, this list of conditions and the following disclaimer in the
           documentation and/or other materials provided with the distribution.

        THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
        INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
        AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
        AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
        OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
        SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
        INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
        CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
        ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
        POSSIBILITY OF SUCH DAMAGE.
*/
/*
	Stripped down to display just core hardware information
*/

$nocsrf = true;

require_once("functions.inc");
require_once("guiconfig.inc");
require_once('notices.inc');

?>
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr>
			<td width="35%" class="vncellt">CPU usage</td>
			<td width="65%" class="listr">
				<?php $cpuUsage = "0"; ?>
				<table border="0" cellspacing="0" cellpadding="0"><tr><td>
				<img src="./themes/<?= $g['theme']; ?>/images/misc/bar_left.gif" height="15" width="4" border="0" align="middle" alt="left bar" /><img src="./themes/<?= $g['theme']; ?>/images/misc/bar_blue.gif" height="15" name="cpuwidtha" id="cpuwidtha" width="<?= $cpuUsage; ?>" border="0" align="middle" alt="red bar" /><img src="./themes/<?= $g['theme']; ?>/images/misc/bar_gray.gif" height="15" name="cpuwidthb" id="cpuwidthb" width="<?= (100 - $cpuUsage); ?>" border="0" align="middle" alt="gray bar" /><img src="./themes/<?= $g['theme']; ?>/images/misc/bar_right.gif" height="15" width="5" border="0" align="middle" alt="right bar" />
				</td><td>
				<input style="border: 0px solid white;" size="10" name="cpumeter" id="cpumeter" value="(Updating...)" />
				</td></tr></table>
			</td>
		</tr>
		<tr>
			<td width="35%" class="vncellt">Memory used</td>
			<td width="65%" class="listr">
				<?php $memUsage = mem_usage(); ?>
				<table border="0" cellspacing="0" cellpadding="0"><tr><td>
				<img src="./themes/<?= $g['theme']; ?>/images/misc/bar_left.gif" height="15" width="4" border="0" align="middle" alt="left bar" /><img src="./themes/<?= $g['theme']; ?>/images/misc/bar_blue.gif" height="15" name="memwidtha" id="memwidtha" width="<?= $memUsage; ?>" border="0" align="middle" alt="red bar" /><img src="./themes/<?= $g['theme']; ?>/images/misc/bar_gray.gif" height="15" name="memwidthb" id="memwidthb" width="<?= (100 - $memUsage); ?>" border="0" align="middle" alt="gray bar" /><img src="./themes/<?= $g['theme']; ?>/images/misc/bar_right.gif" height="15" width="5" border="0" align="middle" alt="right bar" />
				</td><td>
				<input style="border: 0px solid white;" size="10" name="memusagemeter" id="memusagemeter" value="<?= $memUsage.'%'; ?>" />
				</td></tr></table>
			</td>
		</tr>
		<?php if($showswap == true): ?>
		<tr>
			<td width="35%" class="vncellt">SWAP used</td>
			<td width="65%" class="listr">
				<?php $swapusage = swap_usage(); ?>
				<table border="0" cellspacing="0" cellpadding="0"><tr><td>
				<img src="./themes/<?= $g['theme']; ?>/images/misc/bar_left.gif" height="15" width="4" border="0" align="middle" alt="left bar" /><img src="./themes/<?= $g['theme']; ?>/images/misc/bar_blue.gif" height="15" width="<?= $swapusage; ?>" border="0" align="middle" alt="red bar" /><img src="./themes/<?= $g['theme']; ?>/images/misc/bar_gray.gif" height="15" width="<?= (100 - $swapusage); ?>" border="0" align="middle" alt="gray bar" /><img src="./themes/<?= $g['theme']; ?>/images/misc/bar_right.gif" height="15" width="5" border="0" align="middle" alt="right bar" />
				</td><td>
				<input style="border: 0px solid white;" size="10" name="swapusagemeter" id="swapusagemeter" value="<?= $swapusage.'%'; ?>" />
				</td></tr></table>
			</td>
		</tr>
		<?php endif; ?>
<?php
		if(has_temp()):
?>
		<tr>
			<td width='35%' class='vncellt'>Temperature</td>
			<td width='65%' class='listr'>
				<?php $temp = get_temp(); ?>
				<img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_left.gif" height="15" width="4" border="0" align="middle" alt="left bar" /><img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_blue.gif" height="15" name="tempwidtha" id="tempwidtha" width="<?= $temp; ?>" border="0" align="middle" alt="red bar" /><img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_gray.gif" height="15" name="tempwidthb" id="tempwidthb" width="<?= (100 - $temp); ?>" border="0" align="middle" alt="gray bar" /><img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_right.gif" height="15" width="5" border="0" align="middle" alt="right bar" />
				&nbsp;
				<input style="border: 0px solid white;" size="30" name="tempmeter" id="tempmeter" value="<?= $temp."C"; ?>" />
			</td>
		</tr>
		<?php endif; ?>
		<tr>
			<td width="35%" class="vncellt">/ used</td>
			<td width="65%" class="listr">
				<?php $diskusage = disk_usage("/"); ?>
				<table border="0" cellspacing="0" cellpadding="0"><tr><td>
				<img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_left.gif" height="15" width="4" border="0" align="middle" alt="left bar" /><img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_blue.gif" height="15" width="<?= $diskusage; ?>" border="0" align="middle" alt="red bar" /><img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_gray.gif" height="15" width="<?= (100 - $diskusage); ?>" border="0" align="middle" alt="gray bar" /><img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_right.gif" height="15" width="5" border="0" align="middle" alt="right bar" />
				</td><td>
				<input style="border: 0px solid white;" size="10" name="diskusagemeter" id="diskusagemeter" value="<?= $diskusage.'%'; ?>" />
				</td></tr></table>
			</td>
		</tr>
		<tr>
			<td width="35%" class="vncellt">/space used</td>
			<td width="65%" class="listr">
				<?php $diskusage = disk_usage("/space"); ?>
				<table border="0" cellspacing="0" cellpadding="0"><tr><td>
				<img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_left.gif" height="15" width="4" border="0" align="middle" alt="left bar" /><img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_blue.gif" height="15" width="<?= $diskusage; ?>" border="0" align="middle" alt="red bar" /><img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_gray.gif" height="15" width="<?= (100 - $diskusage); ?>" border="0" align="middle" alt="gray bar" /><img src="./themes/<?= $g["theme"]; ?>/images/misc/bar_right.gif" height="15" width="5" border="0" align="middle" alt="right bar" />
				</td><td>
				<input style="border: 0px solid white;" size="10" name="diskusagemeter" id="diskusagemeter" value="<?= $diskusage.'%'; ?>" />
				</td></tr></table>
			</td>
		</tr>
	</tbody>
</table>
<script type="text/javascript">
	function getstatus() {
		scroll(0,0);
		var url = "/widgets/widgets/core_system_information.widget.php";
		var pars = 'getupdatestatus=yes';
		var myAjax = new Ajax.Request(
			url,
			{
				method: 'get',
				parameters: pars,
				onComplete: activitycallback
			});
	}
	function activitycallback(transport) {
		$('updatestatus').innerHTML = transport.responseText;
	}
	function swapuname() {
		$('uname').innerHTML="<?php echo php_uname("a"); ?>";
	}
	setTimeout('getstatus()', 4000);
</script>

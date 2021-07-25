<?php if (!class_exists('Vesta')) exit; ?>


<div class="l-center">
    <div class="l-sort clearfix noselect">
        <a class="l-sort__create-btn" href="/plugin-manager/add/" title="<?= __('Install plugin') ?>"></a>

        <div class="l-sort-toolbar clearfix" style="min-height: 30px;">
            <table>
                <tr>
                    <td class="step-right">
                        <a class="vst" href="/plugin/dotnetapps/info"><?=__('.net info')?> <i></i></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="l-center units vestacp-web-apps">

<form action="index.php" method="post">
    <h1><?= __(".net Web Apps") ?></h1>

  
        <p class="vst-text"><b><?= __("Github repo Name") ?></b></p>
       <p> <input type="text" class="vst-input" name="githubRepoName" required/></p>

       <p class="vst-text"><b><?= __("Github User Name") ?></b></p>
       <p> <input type="text" class="vst-input" name="githubUser" required/></p>

       <p class="vst-text"><b><?= __("Github Token") ?></b></p>
       <p> <input type="text" class="vst-input" name="githubToken" required/></p>
    

    <select name="webDomain" class="vst-list" required>
        <option value=""><?= __("Select a web domain") ?></option>
        <?php
        $users = Vesta::exec("v-list-users", "json");
        ksort($users);

        foreach ($users as $user_name => $value) {
            $web_domains = Vesta::exec("v-list-web-domains", $user_name, "json");
            ksort($web_domains);

            foreach ($web_domains as $web_domain => $domain_data) {
                if ($user == 'admin' || $user == $user_name) {
                    $display_name = ($_SESSION['user'] == 'admin') ? "$user_name - $web_domain" : "$web_domain";

                    echo "<option value=\"$user_name|$web_domain\">$display_name</option>";
                }
            }
        }
        ?>
    </select>
    <br><br>

    <input type="hidden" name="action" value="install"/>
    <button class="button confirm" type="submit"><?= __("Install") ?></button>
</form>

<form action="index.php" method="post">
<input type="hidden" name="action" value="runtimes"/>
    <button class="button" type="submit"><?= __(".net runtime versions") ?></button>
</form>
</div>

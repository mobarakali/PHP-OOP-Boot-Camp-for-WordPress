<?php
interface Plugin{
    public function activate();
    public function deactivate();
}
class MySiteTools implements Plugin{
    public function activate(){
        return "Plugin Activated!\n";
    }

    public function deactivate()
    {
        return "Plugin Deactivated\n";
    }
}

$myPlugin = new MySiteTools();
echo $myPlugin->activate();
echo $myPlugin->deactivate();
<?php
/*
 * @author Anakeen
 * @license http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License
 * @package FDL
 */

include_once ("FDL/Class.Doc.php");
function docview(Action & $action)
{
    
    $usage = new ActionUsage($action);
    $usage->setText("document html view");
    $docid = $usage->addNeeded("id", "document id");
    $usage->verify();
    
    $d = new_doc($action->dbaccess, $docid, true);
    if (!$d->isAlive()) $action->exitError(sprintf("document id %s not found", $docid));
    
    $action->lay->set("docTitle", $d->getHTMLTitle());
    $action->lay->set("docIcon", $d->getIcon('', 40));
    
    $values = $d->getvalues();
    $out = array();
    $frames = array();
    foreach ($values as $aid => $value) {
        if ($value !== '') {
            $oa = $d->getAttribute(($aid));
            if ($oa) {
                
                if ($oa->type == "docid" || $oa->type == "account") {
                    simpleQuery($action->dbaccess, sprintf('select icon from docread where id=%d', $value) , $iconValue, true, true);
                    $displayValue = sprintf('<a class="relation" data-role="button" data-inline="true" data-docid="%d"> <img src="%s"/> %s</a>', $value, $d->getIcon($iconValue, 16) , $d->getHTMLTitle($value));
                } else {
                    $displayValue = $d->getHtmlValue($oa, $value);
                }
                $setId = $oa->fieldSet->id;
                $out[$setId][] = array(
                    "label" => mb_ucfirst($oa->getLabel()) ,
                    "value" => $displayValue
                );
                if (!isset($frames[$setId])) {
                    $frames[$setId] = array(
                        "frameLabel" => mb_ucfirst($oa->fieldSet->getLabel()) ,
                        "FID" => "F$setId",
                        "frameId" => $setId
                    );
                }
            }
        }
    }
    $action->lay->set("docid", $docid);
    $action->lay->setBlockData("FRAMES", $frames);
    foreach ($frames as $fid => $fv) {
        $action->lay->setBlockData($fv["FID"], $out[$fid]);
    }
}

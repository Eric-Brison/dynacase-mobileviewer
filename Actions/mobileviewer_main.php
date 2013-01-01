<?php
/*
 * @author Anakeen
 * @license http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License
 * @package FDL
 */


function mobileviewer_main(Action & $action)
{
    
    $s = new SearchDoc($action->dbaccess, 1925);
    $s->setSlice(20);
    $s->setObjectReturn(true);
    $dl = $s->search();
    if ($s->searchError()) {
        $action->exitError($s->getError());
    }
    $dl = $s->getDocumentList();
    
    $list = array();
    /**
     * @var Doc $doc
     */
    foreach ($dl as $id => $doc) {
        $list[] = array(
            "docid" => $doc->id,
            "docicon" => $doc->getIcon("", 30) ,
            "doctitle" => $doc->getTitle()
        );
    }
    $action->lay->setBlockData("DOCLIST", $list);
}

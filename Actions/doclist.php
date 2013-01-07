<?php
/*
 * @author Anakeen
 * @license http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License
 * @package FDL
 */


function doclist(Action & $action)
{
    
    $s = new SearchDoc($action->dbaccess);
    $s->setSlice(20);
    $s->setObjectReturn(true);
    $s->addFilter("doctype !~ 'S'");
    $s->addGeneralFilter($action->getArgument("keyword"));
   // $s->setPertinenceOrder();
    $s->setOrder("adate desc");
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
            "docicon" => $doc->getIcon("", 40) ,
            "doctitle" => $doc->getTitle(),
            "doctext" => str_replace('[', '&#1B;', nl2br($s->getHighLightText($doc, '<strong>', '</strong>', $action->GetParam("FULLTEXT_HIGHTLIGHTSIZE", 200))))
        );
    }
    $action->lay->setBlockData("DOCLIST", $list);
}

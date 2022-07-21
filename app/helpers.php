<?php 
if(!function_exists("vietproHelper")){
    function vietproHelper(){
        echo "Vietpro Helper !";
    }
}

if(!function_exists("showCategories")){
    function showCategories($categories, $parent, $char, $parent_id_child){
        foreach($categories as $category){
            if($category["parent"] == $parent){
                if($category["id"] == $parent_id_child){
                    echo "<option selected value=".$category['id'].">".$char.$category["name"]."</option>";
                }
                else{
                    echo "<option value=".$category['id'].">".$char.$category["name"]."</option>";
                } 
                
                $newParent = $category['id'];
                showCategories($categories, $newParent, $char."|-- ", $parent_id_child);
            }
        }
    }
}
?>
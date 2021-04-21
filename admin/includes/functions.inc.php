<?php
function FormatField($fieldname,$id){
    $limit=35;
    if(isset($fieldname)){
        if(strlen($fieldname)>$limit){
            $shortfield=substr($fieldname, 0, $limit-19);
        return '<div id="accordion">
                <div class="card">
                    <div class="card-header" id="heading'.$id.'">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse'.$id.'" aria-expanded="false" aria-controls="collapse'.$id.'">
                        
                        '.$shortfield."...".'
                        
                        </button>
                    </h5>
                    </div>

                    <div id="collapse'.$id.'" class="collapse" aria-labelledby="heading'.$id.'" data-parent="#accordion">
                    <div class="card-body">
                        
                        '.$fieldname.'
                        
                    </div>
                    </div>
                </div>
            </div>';

        }else{
            return $fieldname;
        };
    }else{
        return "Campo não preenchido";
    }

}

?>
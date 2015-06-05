<?php
//BindEvents Method @1-A0EC3DBA
function BindEvents()
{
    global $EditableGrid1;
    global $Grid1;
    $EditableGrid1->CCSEvents["BeforeShowRow"] = "EditableGrid1_BeforeShowRow";
    $EditableGrid1->ds->CCSEvents["BeforeExecuteDelete"] = "EditableGrid1_ds_BeforeExecuteDelete";
    $Grid1->CCSEvents["BeforeShowRow"] = "Grid1_BeforeShowRow";
}
//End BindEvents Method

//EditableGrid1_BeforeShowRow @3-25A2A153
function EditableGrid1_BeforeShowRow(& $sender)
{
    $EditableGrid1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $EditableGrid1; //Compatibility
//End EditableGrid1_BeforeShowRow

//Custom Code @15-2A29BDB7
// -------------------------
    global $NombreAnt;
	global $Tpl;
	$EditableGrid1->hdIdIncidente->SetValue($EditableGrid1->id_incidente->GetValue());
	$EditableGrid1->hdPaquete->SetValue($EditableGrid1->paquete->GetValue());
	
	if ($NombreAnt == $EditableGrid1->paquete->GetValue()){
		$Tpl->SetVar("bgcolorP","#e8e8e8");
	} else {
		$NombreAnt= $EditableGrid1->paquete->GetValue();
		$Tpl->SetVar("bgcolorP","#B0C4DE");
	}
// -------------------------
//End Custom Code

//Close EditableGrid1_BeforeShowRow @3-187CB2B2
    return $EditableGrid1_BeforeShowRow;
}
//End Close EditableGrid1_BeforeShowRow

//EditableGrid1_ds_BeforeExecuteDelete @3-9D1FF069
function EditableGrid1_ds_BeforeExecuteDelete(& $sender)
{
    $EditableGrid1_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $EditableGrid1; //Compatibility
//End EditableGrid1_ds_BeforeExecuteDelete

//Custom Code @17-2A29BDB7
// -------------------------
    global $dbRelacionados;
    global $sText;
    global $flgError;
    
    $flgError=0;
    
    $dbRelacionados= new clsDBcnDisenio;
    
    
    $dbRelacionados->query("begin TRANSACTION");
	//inserta en la tabla de relacionados
    $sSQL = "Insert into mc_incidentes_relacionados (Inc_Principal, Paquete, Inc_Secundario) " .
    	"  select distinct '" . $EditableGrid1->hdIdIncidente->GetValue() . "', paquete, d.id_incidente " .
    	" from mc_detalle_incidente_avl d 	inner join mc_universo_cds u on  u.numero = d.id_incidente " .
    	" 	and month(d.FechaCarga )= u.mes  and YEAR(d.FechaCarga) = u.anio where mes= " . CCGetParam("s_mes",0) . " and anio = " . CCGetParam("s_anio",0) .
    	" 	and tipo='IN' and Paquete in ( " .
    	" 		select Paquete 	from mc_detalle_incidente_avl " .
    	" 			inner join mc_universo_cds u on u.mes = MONTH(FechaCarga) and u.anio = YEAR(FechaCarga) and u.numero = Id_Incidente " .
    	"		where month(FechaCarga )= u.mes  and YEAR(FechaCarga) = u.anio group by Paquete  	having count(distinct id_incidente) >1 " .
    	") and Paquete ='" . $EditableGrid1->hdPaquete->GetValue() . "' and d.Id_Incidente <>'" .  $EditableGrid1->hdIdIncidente->GetValue() . "'";
    $dbRelacionados->query($sSQL);
    if($dbRelacionados->Errors->Count()){
		$EditableGrid1->Errors->addError("1.-" . $dbRelacionados->Errors->ToString());
    	$flgError=$flgError +  $dbRelacionados->Errors->Count();
    }
    //borra la medicion del relacionado
    $sSQL  = "delete from mc_calificacion_incidentes_MC  where id_incidente in ( " .
    	" select Inc_Secundario from mc_incidentes_relacionados where Inc_Principal ='" . $EditableGrid1->hdIdIncidente->GetValue() . "')" .
    	" and Inc_Secundario not in (select numero from mc_universo_cds where tipo = 'IN'  and (medido=0 or Medido is null))";
	$dbRelacionados->query($sSQL);
    if($dbRelacionados->Errors->Count()){
		$EditableGrid1->Errors->addError("2.-" . $dbRelacionados->Errors->ToString());
    	$flgError=$flgError +  $dbRelacionados->Errors->Count();
    }
    
    //borra los relacionados del universo
    $sSQL  = "delete from mc_universo_cds where tipo = 'IN'  and (medido=0 or Medido is null)  and mes= " . CCGetParam("s_mes",0) . " and anio = " . CCGetParam("s_anio",0) .
    		"and numero in  (select Inc_Secundario from mc_incidentes_relacionados where Inc_Principal ='" . $EditableGrid1->hdIdIncidente->GetValue() . "')";
    $dbRelacionados->query($sSQL);
 	if($dbRelacionados->Errors->Count()){
		$EditableGrid1->Errors->addError("3.-" . $dbRelacionados->Errors->ToString());
    	$flgError=$flgError +  $dbRelacionados->Errors->Count();
    }
 	
    
    if($flgError!=0){
		$dbRelacionados->query("ROLLBACK");
		$EditableGrid1->Errors->addError($flgError);
    } else {
 		$dbRelacionados->query("COMMIT");   
    }
    
    
// -------------------------
//End Custom Code

//Close EditableGrid1_ds_BeforeExecuteDelete @3-1C5C0FB8
    return $EditableGrid1_ds_BeforeExecuteDelete;
}
//End Close EditableGrid1_ds_BeforeExecuteDelete

//Grid1_BeforeShowRow @29-FCC1FF76
function Grid1_BeforeShowRow(& $sender)
{
    $Grid1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid1; //Compatibility
//End Grid1_BeforeShowRow

//Custom Code @41-2A29BDB7
// -------------------------
    global $NombreAnt1;
	global $Tpl;	
	if ($NombreAnt1 == $Grid1->Inc_Principal->GetValue()){
		$Tpl->SetVar("bgcolorP1","#e8e8e8");
	} else {
		$NombreAnt1= $Grid1->Inc_Principal->GetValue();
		$Tpl->SetVar("bgcolorP1","#B0C4DE");
	}
// -------------------------
//End Custom Code

//Close Grid1_BeforeShowRow @29-23E47D26
    return $Grid1_BeforeShowRow;
}
//End Close Grid1_BeforeShowRow


?>

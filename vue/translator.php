<?php

function frenchtranslator($word){
	
    if($word=="view")
    {
        return "Consulter";
        
    } else if($word=="add")
    {
        return "Ajouter";
        
    }else if($word=="update")
    {
        return "Modifier";
        
    }else if($word=="delete")
    {
        return "Supprimer";
        
    }else if($word=="group")
    {
        return "Groupes";
        
    }else if($word=="building")
    {
        return "Bâtiments";
        
    }else if($word=="classroom")
    {
        return "Locaux";
        
    }else if($word=="customer")
    {
        return "Clients";
        
    }else if($word=="program")
    {
        return "Programmes";
        
    }else if($word=="qualification")
    {
        return "Compétences";
        
    }else if($word=="teacher")
    {
        return "Enseignants";
        
    }
    else if($word=="user")
    {
        return "Utilisateurs";
        
    }else if($word=="right")
    {
        return "Droits";
        
    }else if($word=="role")
    {
        return "Rôles";
        
    }else if($word=="teacher_qualification")
    {
        return "Compétences des enseignants";
        
    }else if($word=="building_classroom")
    {
        return "Locaux des batiments";
        
    }else if($word=="program_qualification")
    {
        return "Compétences des programmes";
        
    } else if($word == "nature_time"){
    	return "Temps de nature";
    } else if($word == "year"){
    	return "Années";
    } else if($word == "qualification_teached"){
    	return "Compétences enseignées";
    }
    else if($word=="pedago_day_all")
    {
        return "Journée pédagogique";
        
    }else if($word=="pedago_day"){
        return "Journée pédagogique de programme";
        
    }else if($word=="week"){
    	return "Semaines";
    	
    }else if($word=="zone"){
        return "Zones";
        
    }else if($word=="fixed_holiday"){
        return "Congés";
        
    }else if($word=="group_qualification_teached"){
        return "Compétences enseignés des groupes";
        
    }else if($word=="schedule"){
    	return "Horaire";
    	
    }
    else{
        return $word;
    }
  
    
}
function englishtranslator($word){
    
    if($word=="view")
    {
        return "View";
        
    } else if($word=="add")
    {
        return "Add";
        
    }else if($word=="update")
    {
        return "Update";
        
    }else if($word=="delete")
    {
        return "Delete";
        
    }else if($word=="group")
    {
        return "Group";
        
    }else if($word=="building")
    {
        return "Building";
        
    }else if($word=="classroom")
    {
        return "Classroom";
        
    }else if($word=="customer")
    {
        return "Customer";
        
    }else if($word=="program")
    {
        return "Program";
        
    }else if($word=="qualification")
    {
        return "Qualification";
        
    }else if($word=="teacher")
    {
        return "Teacher";
        
    }
    else if($word=="user")
    {
        return "User";
        
    }else if($word=="right")
    {
        return "Right";
        
    }else if($word=="role")
    {
        return "Role";
        
    }else{
        return $word;
    }
}

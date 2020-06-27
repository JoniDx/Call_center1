<?php
class Time{
  public function toHours($time)
  {
    $hora = substr($time, 0, 3);
    $minutos = substr($time, 3, 2);
    $segundos = substr($time, 6, 2);
    // echo $minutos;
    // hora a convertir a minutos
    $horaEntrada = "$hora";
    //realizamos una partición que separe la parte de la hora y la parte de los minutos
    $v_HorasPartes = explode(":", $horaEntrada);
    // echo $v_HorasPartes[0];

    //la parte de la hora la multiplicamos por 60 para pasarla a minutos y así realizar la suma de los minutos totales
    $min= ($v_HorasPartes[0] * 60);
    $min= $min + $minutos;
    // echo $min;

   //obtener segundos
    $sec = $min * 60;
    $sec = $sec + $segundos;
    // echo $sec;
    //dias es la division de n segs entre 86400 segundos que representa un dia
    $dias=floor($sec/86400);

    //mod_hora es el sobrante, en horas, de la division de días;
    $mod_hora=$sec%86400;
    // echo $mod_hora;
    //hora es la division entre el sobrante de horas y 3600 segundos que representa una hora;
    $horas=floor($mod_hora/3600);
     // echo $horas;

    //mod_minuto es el sobrante, en minutos, de la division de horas;
    $mod_minuto=$mod_hora%3600;
    //minuto es la division entre el sobrante y 60 segundos que representa un minuto;
    $minutos=floor($mod_minuto/60);
    // $text = $dias." dias ".$horas." hrs ".$minutos." min";

    if($horas<=0&& $dias<=0)
    {
    $text = $minutos.' min';
    }
    elseif($dias<=0)
    {

    if($type=='round')
    //nos apoyamos de la variable type para especificar si se muestra solo las horas
    {
    $text = $horas.' hrs';
    }
    else
    {
    $text = $horas." hrs ".$minutos.' min';
    }

    }
    else
    {

    //nos apoyamos de la variable type para especificar si se muestra solo los dias
    if($type=='round')
    {
    $text = $dias.' dias';
    }
    else
    {
    $text = $dias." dias ".$horas." hrs ".$minutos." min";
    }

    }
    return $text;
  }
}
 ?>

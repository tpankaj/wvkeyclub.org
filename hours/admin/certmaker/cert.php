<?php
   require_once($_SERVER["DOCUMENT_ROOT"] . "/lib/hours.php");
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub_2013_2014;

   if (!empty($_GET["id"]))
   {
      $member_id = new MongoId($_GET["id"]);
      $member = $db->members->findOne(array("_id" => $member_id));
   }
?>
\documentclass[letterpaper]{letter}
\usepackage[margin=2cm]{geometry}
\usepackage{graphicx}
\usepackage[T1]{fontenc}
\usepackage[lining,scaled=.95]{ebgaramond}
\usepackage[usenames,dvipsnames,svgnames,table]{xcolor}
\definecolor{gray}{gray}{0.5}
\newcommand{\HRule}{\rule{\linewidth}{0.5mm}}
\thispagestyle{empty}
\pagestyle{empty}
\usepackage[permil]{overpic}
\begin{document}
\begin{overpic}[width=\textwidth]{./arrow.png}
  \put(390,22){\color{white} \uppercase{Westview Key Club | Division 37 South | CNH District}}
\end{overpic}
\begin{center}
  {\bfseries
    \textsc{\fontsize{34}{41}\selectfont Certificate of Achievement}\\[0.5cm]
    \HRule \\[0.5cm]
    {\color{gray} \uppercase{\Large This acknowledges that}} \\[1em]
    {\fontsize{36}{43}\selectfont <?php echo $member["fname"]; ?> <?php echo $member["lname"]; ?>} \\[1em]
    {\color{gray} \uppercase{\Large Has successfully completed a total of}}\\[0.5em]
    \uppercase{\Large <?php echo sum_hours($member["hours"]); ?>} {\color{gray} \uppercase{through Westview Key Club}}
    \HRule \\[0.5cm]
  }
\end{center}
{
  \Large
  \begin{tabular}{p{0.5\textwidth} p{0.25\textwidth} p{0.25\textwidth}}
    \textit{Event} & \textit{Date} & \textit{Hours}\\
<?php
   foreach ($member["hours"] as $event_hours)
   {
      $event_id = new MongoId($event_hours["event_id"]);
      $event = $db->events->findOne(array("_id" => $event_id));
      $time = new DateTime();
      $time->setTimestamp(intval($event["time"]["start"]));
      echo str_replace("&","\&",$event["name"]) . " & " . $time->format("F j, Y") . " & " . $event_hours["hours"] . "\\\\";
   }
?>
  \end{tabular}
}
\vfill
\begin{minipage}[b]{0.45\linewidth}
  \includegraphics[height=2cm]{./signature-michael-zhang.png}\\
  \uppercase{Michael Zhang}\\
  {\color{gray}\uppercase{Westview Key Club President 2013--2014}}
\end{minipage}
\hfill
\begin{minipage}[b]{0.45\linewidth}
  \includegraphics[height=2cm]{./signature-oydna.png}\\
  \uppercase{Kellie Oydna}\\
  {\color{gray}\uppercase{Westview Key Club Advisor 2013--2014}}
\end{minipage}
\end{document}


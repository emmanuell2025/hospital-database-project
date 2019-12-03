SELECT apDate, apTime, apDesc, roomNum, drLName, procCost 
FROM appointment, doctor, proc
WHERE appointment.procID = proc.procID 
AND doctor.drID = appointment.drID 
AND doctor.drID = proc.drID 
AND appointment.pMRN = proc.pMRN
AND appointment.pMRN = ' ';
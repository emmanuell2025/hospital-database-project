SELECT patient.pMRN, patient.pFName, patient.pLName, apID, apDesc, appointment.procID, roomNum, apDate, DATE_FORMAT(`appointment`.`apTime`,'%h:%i %p')
FROM appointment, doctor, patient
WHERE patient.pMRN = appointment.pMRN
AND patient.procID = appointment.procID
AND doctor.DeptID = appointment.DeptID
AND doctor.drID = ' ';

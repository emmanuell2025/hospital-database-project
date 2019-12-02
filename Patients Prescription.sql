SELECT pFName, pLName, rxID, rxCost
FROM patient, prescription
WHERE patient.pMRN = prescription.pMRN
AND pMRN = ' ';
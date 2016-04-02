import sqlite3

class DbHandle:
	
	def __init__(self, dbName):
		self.dbName = dbName

	#Gets a list of accounts that are active by that date
	def getAccounts(self,assetOrliability, date):
		query = ("SELECT DISTINCT account_id "
			"FROM balances "
			"WHERE type = ?  "
			"AND date = ?"
			)
		conn = sqlite3.connect(self.dbName)	
		cursor = conn.cursor()
		cursor.execute(query, (assetOrliability,date))
		
		output = []
		for account_id in cursor:
			output.append(account_id[0])

		return output

	#Returns the balance of given account on a given date
	#If no balance is given for that date, the most recent balance is given 
	def getBalanceOnClosestDate(self, account_id, dateLookingFor):
		query = ('SELECT balance '
       		'FROM balances '
       		'WHERE account_id=? '
       		'AND date<=? '
       		'ORDER BY date DESC '
       		'LIMIT 1 '
       		)


		conn = sqlite3.connect(self.dbName)	
		cursor = conn.cursor()

		cursor.execute( query,(account_id, dateLookingFor) )
		return cursor.fetchone()[0]
	
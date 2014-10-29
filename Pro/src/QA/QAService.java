package QA;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.*;
import DBUtil.DBUtil;


public class QAService {
	public void add(String question,String answer) {
		Connection conn = DBUtil.getConn();
		String sql = "insert into QA values(?, ?)";
		PreparedStatement ps = DBUtil.prepare(conn, sql);
		try {
			ps.setString(1, question);
			ps.setString(2, answer);
			ps.executeUpdate();
		} catch (SQLException e) {
			e.printStackTrace();
		}
		DBUtil.close(ps);
		DBUtil.close(conn);
	}

}

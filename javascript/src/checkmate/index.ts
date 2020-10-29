class Board {
  config: any;
  constructor(config: any) {
    this.config = config;
  }

  getPiecePosition(code: string): Array<number> {
    let position: Array<number> = [];
    for (let i = 0; i < this.config.length; i++) {
      for (let j = 0; j < this.config.length; j++) {
        if (this.config[i][j] === code) {
          position = [j, i];
          break;
        }
      }
    }
    if (position.length) {
      return position;
    }
    throw 'Piece is not on the board.';
  }
}

function isCheckmate(board: any) {
  const king = board.getPiecePosition('K');
  const rook = board.getPiecePosition('R');
  const bishop = board.getPiecePosition('B');

  return isKingCheckByBishop(king, bishop) || isKingCheckByRook(king, rook);
}

function isKingCheckByBishop(king: Array<number>, bishop: Array<number>) {
  return Math.abs(king[0] - bishop[0]) === Math.abs(king[1] - bishop[1]);
}

function isKingCheckByRook(king: Array<number>, rook: Array<number>) {
  return king[0] === rook[0] || king[1] === rook[1];
}

export { Board, isCheckmate };

const orientation = ['N', 'E', 'S', 'W'];

const RoverNavigator = class {
  position: Array<any>;
  gridSize: Array<number>;

  constructor(gridSize: Array<number>, initialPos: Array<any>) {
    this.position = initialPos;
    this.gridSize = gridSize;
  }
  getPosition() {
    return this.position;
  }

  command(steps: String) {
    const stepsArray = steps.split('');
    stepsArray.forEach(step => {
      this.takeStep(step);
    });
    return this.position;
  }

  takeStep(step: String) {
    switch (step) {
      case 'L':
      case 'R':
        this.turn(step);
        break;

      case 'M':
        this.move();
    }
    console.log({ step });

    console.log(this.position);
  }

  turn(direction: String) {
    switch (direction) {
      case 'L':
        const currentOrientation: string = this.position[2];
        let nextIndex = orientation.indexOf(currentOrientation) - 1;
        nextIndex = nextIndex === -1 ? 3 : nextIndex;
        this.position[2] = orientation[nextIndex];
        break;
    }
  }

  move() {
    switch (this.position[2]) {
      case 'N':
        this.position[1]++;
        break;
      case 'S':
        this.position[1]--;
        break;
      case 'E':
        this.position[0]++;
        break;
      case 'W':
        this.position[0]--;
        break;
    }
    this.handleOutOfBound();
  }

  handleOutOfBound() {
    [0, 1].forEach(axis => {
      const pos = this.position[axis];
      pos === -1
        ? this.gridSize[axis] - 1
        : pos === this.gridSize[axis]
        ? 0
        : pos;
    });
  }
};

export default RoverNavigator;
